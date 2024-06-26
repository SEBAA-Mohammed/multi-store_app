<?php

namespace App\Filament\Manager\Resources;

use App\Filament\Manager\Resources\UserResource\Pages;
use App\Filament\Manager\Resources\UserResource\Pages\CreateUser;
use App\Filament\Manager\Resources\UserResource\Pages\EditUser;
use App\Filament\Manager\Resources\UserResource\Pages\ListUsers;
use App\Filament\Manager\Resources\UserResource\Pages\ViewUser;
use App\Filament\Manager\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Infolists\Infolist;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\Select;
use Filament\Infolists;
use Filament\Infolists\Components\RepeatableEntry;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $navigationGroup = 'َApp Management';

    protected static ?int $navigationSort = 1;



    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),
                TextInput::make('username')
                    ->required(),
                Select::make('role')
                    ->options([
                        'admin' => 'Admin',
                        'client' => 'Client',
                    ])
                    ->required(),
                TextInput::make('email')
                    ->email()
                    ->required(),
                TextInput::make('password')
                    ->password()
                    ->required()
                    ->hiddenOn('edit'),
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('role')
                    ->searchable()
                    ->badge(),
                TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('stores_count')->counts('stores')->label('Number of Stores'),
                ImageColumn::make('stores.logo_url')
                    ->circular()
                    ->stacked(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\ViewAction::make(),
                // Tables\Actions\EditAction::make(),
                // ViewAction::make(),
                // EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('User Informations')
                    ->schema([
                        Infolists\Components\TextEntry::make('name')->label('Name'),
                        Infolists\Components\TextEntry::make('role')->label('Role'),
                        Infolists\Components\TextEntry::make('email')->label('Email '),
                    ]),

                Infolists\Components\Section::make('Stores')
                    ->schema([
                        RepeatableEntry::make('stores')
                            ->schema([
                                Infolists\Components\TextEntry::make('name'),
                                Infolists\Components\ImageEntry::make('logo_url')->label('Logo'),
                            ])->grid(2)
                    ])
            ]);
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
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            // 'view' => ViewUser::route('/{record}'),
            // 'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}
