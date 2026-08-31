<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Models\Order;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    /*
    |--------------------------------------------------------------------------
    | Navigation & Sidebar Layout Configurations
    |--------------------------------------------------------------------------
    */
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationLabel = 'طلبات الشراء / المبيعات';

    protected static ?string $modelLabel = 'طلب شراء';

    protected static ?string $pluralModelLabel = 'الطلبات والفواتير';

    protected static ?int $navigationSort = 3;

    /*
    |--------------------------------------------------------------------------
    | Visual Form Schema Configuration (Create / Edit View Layout)
    |--------------------------------------------------------------------------
    */
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                // --- COLUMN LEFT: Main Order Data & Product Items (Grid Span 8) ---
                Forms\Components\Group::make()
                    ->schema([

                        // Section A: Checkout Reference Details
                        Forms\Components\Section::make('معلومات الفاتورة الأساسية')
                            ->schema([
                                Forms\Components\TextInput::make('order_number')
                                    ->label('رقم الطلب / الفاتورة')
                                    ->default(fn () => 'CT-'.strtoupper(uniqid()))
                                    ->required()
                                    ->disabled()
                                    ->dehydrated(),

                                Forms\Components\Select::make('user_id')
                                    ->label('العميل / المستخدم')
                                    ->relationship('user', 'name')
                                    ->searchable()
                                    ->preload()
                                    ->required(),

                                Forms\Components\Select::make('payment_method')
                                    ->label('طريقة الدفع')
                                    ->options([
                                        'cash' => 'الدفع عند الاستلام (COD)',
                                        'stripe' => 'بطاقة ائتمان (Stripe)',
                                        'paymob' => 'محفظة إلكترونية (Paymob)',
                                    ])
                                    ->default('cash')
                                    ->required(),

                                Forms\Components\Select::make('payment_status')
                                    ->label('حالة الدفع')
                                    ->options([
                                        'pending' => 'قيد الانتظار',
                                        'paid' => 'تم الدفع بنجاح',
                                        'failed' => 'فشلت عملية الدفع',
                                    ])
                                    ->default('pending')
                                    ->required(),
                            ])->columns(2),

                        // Section B: Interactive Cart Items Repeater Module
                        Forms\Components\Section::make('القطع والأجزاء المشتراة')
                            ->schema([
                                Forms\Components\Repeater::make('items')
                                    ->relationship('items')
                                    ->schema([
                                        Forms\Components\Select::make('product_id')
                                            ->label('اختر قطعة الهاردوير')
                                            ->relationship('product', 'name')
                                            ->required()
                                            ->reactive()
                                            // Automatically injects live structural product catalog pricing fields
                                            ->afterStateUpdated(fn ($state, callable $set) => $set('price', Product::find($state)?->price ?? 0)
                                            )
                                            ->columnSpan(6),

                                        Forms\Components\TextInput::make('quantity')
                                            ->label('الكمية')
                                            ->numeric()
                                            ->default(1)
                                            ->required()
                                            ->columnSpan(2),

                                        Forms\Components\TextInput::make('price')
                                            ->label('سعر الوحدة')
                                            ->numeric()
                                            ->prefix('EGP')
                                            ->required()
                                            ->columnSpan(4),
                                    ])
                                    ->columns(12)
                                    ->createItemButtonLabel('إضافة قطعة أخرى للفاتورة'),
                            ]),
                    ])->columnSpan(['lg' => 8]),

                // --- COLUMN RIGHT: Operational Status & Shipping Logs (Grid Span 4) ---
                Forms\Components\Group::make()
                    ->schema([

                        // Section C: Financial Totals & Fulfillments
                        Forms\Components\Section::make('الحالة التشغيلية والمالية')
                            ->schema([
                                Forms\Components\Select::make('status')
                                    ->label('حالة الطلب')
                                    ->options([
                                        'pending' => 'قيد الانتظار',
                                        'processing' => 'جاري التجهيز وفحص التوافقية',
                                        'shipped' => 'تم التسليم لشركة الشحن',
                                        'completed' => 'تم التوصيل والاعتماد والانتهاء',
                                        'cancelled' => 'تم إلغاء الطلب',
                                    ])
                                    ->default('pending')
                                    ->required(),

                                Forms\Components\TextInput::make('total_price')
                                    ->label('إجمالي حساب الفاتورة')
                                    ->numeric()
                                    ->prefix('EGP')
                                    ->required(),
                            ]),

                        // Section D: Shipping Logistic Metrics
                        Forms\Components\Section::make('تفاصيل اللوجستيات والشحن')
                            ->schema([
                                Forms\Components\Textarea::make('shipping_address')
                                    ->label('عنوان شحن وتوصيل الهاردوير بالكامل')
                                    ->required()
                                    ->rows(3),

                                Forms\Components\Textarea::make('notes')
                                    ->label('ملاحظات العميل أو تجميعة الـ PC')
                                    ->rows(2),
                            ]),
                    ])->columnSpan(['lg' => 4]),
            ])->columns(12);
    }

    /*
    |--------------------------------------------------------------------------
    | Visual Table Layout Configuration (Index List Grid View)
    |--------------------------------------------------------------------------
    */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('order_number')
                    ->label('رقم الفاتورة')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('اسم العميل')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('total_price')
                    ->label('الإجمالي')
                    ->money('EGP')
                    ->sortable(),

                // Dynamic contextual badge coloring frameworks
                Tables\Columns\TextColumn::make('status')
                    ->label('حالة الطلب')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'gray',
                        'processing' => 'warning',
                        'shipped' => 'info',
                        'completed' => 'success',
                        'cancelled' => 'danger',
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('payment_status')
                    ->label('حالة الدفع')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'paid' => 'success',
                        'failed' => 'danger',
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الطلب')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // Integrated operational soft-deletes filtering interface modules
                Tables\Filters\TrashedFilter::make(),
                Tables\Filters\SelectFilter::make('status')
                    ->label('تصفية بحسب الحالة')
                    ->options([
                        'pending' => 'قيد الانتظار',
                        'processing' => 'جاري التجهيز',
                        'shipped' => 'تم الشحن',
                        'completed' => 'مكتمل',
                        'cancelled' => 'ملغي',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                ]),
            ]);
    }

    /*|--------------------------------------------------------------------------|
     | Resource Routing & Eloquent Query System Adjustments
     |--------------------------------------------------------------------------*/
    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }

    // Overriding queries to cleanly list both active tracking logs and deleted trash data
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScopes([SoftDeletingScope::class]);
    }
}
