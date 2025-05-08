<?php

namespace App\Filament\Resources;

use App\Models\Student;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Filament\Resources\StudentResource\Pages;

class StudentResource extends Resource
{
    protected static ?string $model = Student::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $label = 'Student';
    protected static ?string $pluralLabel = 'Students';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\FileUpload::make('photo_url')->image()->label('Photo')->directory('students/photos')->nullable(),
                Forms\Components\TextInput::make('first_name')->required()->maxLength(50),
                Forms\Components\TextInput::make('last_name')->required()->maxLength(50),
                Forms\Components\Select::make('gender')
                    ->required()
                    ->options(['Male' => 'Male', 'Female' => 'Female']),
                Forms\Components\DatePicker::make('dob')->required()->label('Date of Birth'),
                Forms\Components\Textarea::make('address')->maxLength(65535)->nullable(),
                Forms\Components\TextInput::make('grade')->required()->maxLength(10),
                Forms\Components\Select::make('session')
                    ->required()
                    ->options(['Morning' => 'Morning', 'Afternoon' => 'Afternoon']),
                Forms\Components\TextInput::make('parent_contact')->required()->maxLength(100),
                Forms\Components\DatePicker::make('enrolled_date')->required(),
                Forms\Components\Select::make('status')
                    ->required()
                    ->options([
                        'active' => 'Active',
                        'inactive' => 'Inactive',
                        'graduated' => 'Graduated',
                        'transferred' => 'Transferred',
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo_url')->label('Photo')->rounded(),
                Tables\Columns\TextColumn::make('first_name')->label('First Name')->searchable(),
                Tables\Columns\TextColumn::make('last_name')->label('Last Name')->searchable(),
                Tables\Columns\TextColumn::make('gender'),
                Tables\Columns\TextColumn::make('dob')->date(),
                Tables\Columns\TextColumn::make('grade'),
                Tables\Columns\TextColumn::make('session'),
                Tables\Columns\TextColumn::make('parent_contact'),
                Tables\Columns\TextColumn::make('enrolled_date')->date(),
                Tables\Columns\TextColumn::make('status'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')->options([
                    'active' => 'Active',
                    'inactive' => 'Inactive',
                    'graduated' => 'Graduated',
                    'transferred' => 'Transferred',
                ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
