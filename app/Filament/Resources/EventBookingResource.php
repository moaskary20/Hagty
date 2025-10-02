<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventBookingResource\Pages;
use App\Models\EventBooking;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;

class EventBookingResource extends Resource
{
    protected static ?string $model = EventBooking::class;

    protected static ?string $navigationIcon = 'heroicon-o-ticket';
    
    protected static ?string $navigationLabel = 'الحجوزات';
    
    protected static ?string $modelLabel = 'حجز';
    
    protected static ?string $pluralModelLabel = 'الحجوزات';
    
    protected static ?string $navigationGroup = 'ايفينتاتى';
    
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('معلومات الفعالية')
                    ->schema([
                        Forms\Components\Select::make('event_id')
                            ->label('الفعالية')
                            ->relationship('event', 'title')
                            ->required()
                            ->searchable()
                            ->preload()
                            ->columnSpanFull(),
                    ]),

                Section::make('معلومات العميل')
                    ->schema([
                        Forms\Components\TextInput::make('customer_name')
                            ->label('اسم العميل')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('customer_email')
                            ->label('البريد الإلكتروني')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('customer_phone')
                            ->label('رقم الهاتف')
                            ->tel()
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(3),

                Section::make('تفاصيل الحجز')
                    ->schema([
                        Forms\Components\TextInput::make('number_of_tickets')
                            ->label('عدد التذاكر')
                            ->required()
                            ->numeric()
                            ->minValue(1)
                            ->default(1),
                        Forms\Components\TextInput::make('total_amount')
                            ->label('المبلغ الإجمالي')
                            ->required()
                            ->numeric()
                            ->prefix('جنيه'),
                        Forms\Components\TextInput::make('booking_reference')
                            ->label('رقم الحجز المرجعي')
                            ->default(fn () => EventBooking::generateBookingReference())
                            ->disabled()
                            ->dehydrated()
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columns(3),

                Section::make('الحالة')
                    ->schema([
                        Forms\Components\Select::make('booking_status')
                            ->label('حالة الحجز')
                            ->options([
                                'pending' => 'قيد الانتظار',
                                'confirmed' => 'مؤكد',
                                'cancelled' => 'ملغي',
                            ])
                            ->required()
                            ->default('pending'),
                        Forms\Components\Select::make('payment_status')
                            ->label('حالة الدفع')
                            ->options([
                                'pending' => 'قيد الانتظار',
                                'paid' => 'مدفوع',
                                'refunded' => 'مسترد',
                            ])
                            ->required()
                            ->default('pending'),
                        Forms\Components\Textarea::make('special_requests')
                            ->label('طلبات خاصة')
                            ->rows(3)
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('booking_reference')
                    ->label('رقم الحجز')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->copyable(),
                Tables\Columns\TextColumn::make('event.title')
                    ->label('الفعالية')
                    ->searchable()
                    ->sortable()
                    ->limit(30),
                Tables\Columns\TextColumn::make('customer_name')
                    ->label('اسم العميل')
                    ->searchable(),
                Tables\Columns\TextColumn::make('customer_phone')
                    ->label('الهاتف')
                    ->searchable(),
                Tables\Columns\TextColumn::make('number_of_tickets')
                    ->label('عدد التذاكر')
                    ->numeric()
                    ->sortable()
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('total_amount')
                    ->label('المبلغ')
                    ->money('EGP')
                    ->sortable(),
                Tables\Columns\TextColumn::make('booking_status')
                    ->label('حالة الحجز')
                    ->badge()
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'confirmed',
                        'danger' => 'cancelled',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'قيد الانتظار',
                        'confirmed' => 'مؤكد',
                        'cancelled' => 'ملغي',
                        default => $state,
                    }),
                Tables\Columns\TextColumn::make('payment_status')
                    ->label('حالة الدفع')
                    ->badge()
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'paid',
                        'info' => 'refunded',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'قيد الانتظار',
                        'paid' => 'مدفوع',
                        'refunded' => 'مسترد',
                        default => $state,
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('تاريخ الحجز')
                    ->dateTime('Y/m/d H:i')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('booking_status')
                    ->label('حالة الحجز')
                    ->options([
                        'pending' => 'قيد الانتظار',
                        'confirmed' => 'مؤكد',
                        'cancelled' => 'ملغي',
                    ]),
                Tables\Filters\SelectFilter::make('payment_status')
                    ->label('حالة الدفع')
                    ->options([
                        'pending' => 'قيد الانتظار',
                        'paid' => 'مدفوع',
                        'refunded' => 'مسترد',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEventBookings::route('/'),
            'create' => Pages\CreateEventBooking::route('/create'),
            'edit' => Pages\EditEventBooking::route('/{record}/edit'),
        ];
    }
}
