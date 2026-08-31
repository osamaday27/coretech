<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    // Customizing Navigation Icons & Labels for Core Tech Brand
    protected static ?string $navigationIcon = 'heroicon-o-cpu-chip';
    protected static ?string $navigationLabel = 'المنتجات / الهاردوير';
    protected static ?string $modelLabel = 'منتج هاردوير';
    protected static ?string $pluralModelLabel = 'المنتجات';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Grouping form inputs into a beautiful 2-column card layout
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('name')
                                ->label('اسم قطعة الهاردوير')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                // Automatically triggers slug generation using Laravel Str utility
                                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                            Forms\Components\TextInput::make('slug')
                                ->label('الرابط الفريد (Slug)')
                                ->disabled()
                                ->dehydrated()
                                ->required()
                                ->unique(Product::class, 'slug', ignoreRecord: true),
                        ]),

                        Forms\Components\RichEditor::make('description')
                            ->label('المواصفات الفنية والوصف')
                            ->columnSpanFull(),

                        Forms\Components\Grid::make(3)->schema([
                            Forms\Components\TextInput::make('price')
                                ->label('السعر')
                                ->numeric()
                                ->prefix('EGP')
                                ->required(),

                            Forms\Components\TextInput::make('stock')
                                ->label('المخزون المتوفر (Stock)')
                                ->numeric()
                                ->default(0)
                                ->required(),

                            Forms\Components\Select::make('category_id')
                                ->label('التصنيف الرئيسي')
                                ->relationship('category', 'name')
                                ->searchable()
                                ->preload()
                                ->required(),
                        ]),

                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\FileUpload::make('image')
                                ->label('الصورة الأساسية للمنتج')
                                ->image()
                                ->directory('products/thumbnails'),

                            Forms\Components\FileUpload::make('gallery')
                                ->label('ألبوم الصور الإضافية')
                                ->image()
                                ->multiple()
                                ->directory('products/gallery'),
                        ]),

                        Forms\Components\Toggle::make('is_active')
                            ->label('تفعيل حالة العرض في المتجر')
                            ->default(true)
                            ->required(),
                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // عرض الصورة بشكل دائري فخم مع تبريز حواف نيون
                Tables\Columns\ImageColumn::make('image')
                    ->label('صورة القطعة')
                    ->circular()
                    ->stacked()
                    ->grow(false),

                // اسم المنتج يظهر بخط عريض وبجانبه الـ Slug كرابط ذكي
                Tables\Columns\TextColumn::make('name')
                    ->label('المنتج')
                    ->weight('bold')
                    ->searchable()
                    ->description(fn ($record) => "الرابط: {$record->slug}")
                    ->sortable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label('التصنيف')
                    ->badge()
                    ->color('gray') // وسم رمادي غامق أنيق خلف النص
                    ->sortable(),

                // السعر يظهر بلون ذهبي مخصص ملفت للإنتباه
                Tables\Columns\TextColumn::make('price')
                    ->label('السعر الحالي')
                    ->money('EGP')
                    ->weight('heavy')
                    ->color('amber') // تلوين الحساب بالذهبي
                    ->sortable(),

                // عداد المخزون التفاعلي الذكي (Progress Bar أو Badges مشعة)
                Tables\Columns\TextColumn::make('stock')
                    ->label('حالة المخزن')
                    ->sortable()
                    ->badge()
                    ->icon(fn (int $state): string => $state <= 5 ? 'heroicon-m-exclamation-triangle' : 'heroicon-m-check-circle')
                    ->color(fn (int $state): string => match (true) {
                        $state <= 0 => 'danger',
                        $state <= 5 => 'warning',
                        default => 'success',
                    }),

                Tables\Columns\IconColumn::make('is_active')
                    ->label('الحالة في المتجر')
                    ->boolean()
                    ->trueIcon('heroicon-o-eye')
                    ->falseIcon('heroicon-o-eye-slash'),
            ])
            // تعديل واجهة الاستخدام لتصبح سريعة الاستجابة (Responsive Layout)
            ->contentGrid([
                'md' => 2,
                'xl' => 3, // 👈 تحويل الجدول النمطي إلى كروت شبكية متراصة (Cards Grid Layout) تملأ الشاشة فوراً!
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([ // تجميع الأزرار النمطية في قائمة منبثقة ذكية وموفرة للمساحة
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])->icon('heroicon-m-ellipsis-vertical')
                  ->color('primary')
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }

    // Overriding the Eloquent query engine to support viewing items inside the Trash bin
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
