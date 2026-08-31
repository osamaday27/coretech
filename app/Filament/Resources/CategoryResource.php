<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    // تخصيص المظهر والأيقونة لتناسب Core Tech
    protected static ?string $navigationIcon = 'heroicon-o-tag';
    protected static ?string $navigationLabel = 'تصنيفات القطع';
    protected static ?string $modelLabel = 'تصنيف هاردوير';
    protected static ?string $pluralModelLabel = 'التصنيفات';
    
    // ترتيب ظهور القائمة الجانبية (التصنيفات تظهر قبل المنتجات)
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make()
                    ->schema([
                        Forms\Components\Grid::make(2)->schema([
                            Forms\Components\TextInput::make('name')
                                ->label('اسم التصنيف (مثل: كروت شاشة، معالجات)')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur: true)
                                // توليد الـ Slug تلقائياً بمجرد كتابة الاسم والانتقال للحقل التالي
                                ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                            Forms\Components\TextInput::make('slug')
                                ->label('الرابط الفريد (Slug)')
                                ->disabled()
                                ->dehydrated()
                                ->required()
                                ->unique(Category::class, 'slug', ignoreRecord: true),
                        ]),

                        Forms\Components\FileUpload::make('icon')
                            ->label('أيقونة أو صورة التصنيف')
                            ->image()
                            ->directory('categories/icons')
                            ->columnSpanFull(),

                        Forms\Components\Toggle::make('is_visible')
                            ->label('إظهار التصنيف في القائمة والواجهة للمستخدمين')
                            ->default(true)
                            ->required(),
                    ])->columnSpanFull()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('icon')
                    ->label('الأيقونة'),

                Tables\Columns\TextColumn::make('name')
                    ->label('اسم التصنيف')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                    ->label('الرابط (Slug)')
                    ->sortable(),

                // حساب عدد منتجات الهاردوير المرتبطة بهذا التصنيف تلقائياً
                Tables\Columns\TextColumn::make('products_count')
                    ->label('عدد المنتجات')
                    ->counts('products')
                    ->badge()
                    ->color('info'),

                Tables\Columns\IconColumn::make('is_visible')
                    ->label('مرئي')
                    ->boolean(),

                Tables\Columns\TextColumn::make('deleted_at')
                    ->label('تاريخ الحذف')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // دمج ميزة الـ SoftDeletes في جدول التصنيفات ( Trash Bin )
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }

    // تعديل كود الاستعلام ليدعم جلب العناصر المحذوفة ناعماً (Soft Deleted) لعرضها في سلة المهملات
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
