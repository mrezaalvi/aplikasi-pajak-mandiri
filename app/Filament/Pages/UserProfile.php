<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;

class UserProfile extends Page Implements HasForms
{
    protected static ?string $navigationIcon = 'heroicon-o-user';
    
    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $title = 'Profil Pengguna';
 
    protected static ?string $navigationLabel = 'Profil Pengguna';
    
    protected static ?string $slug = 'profil-pengguna';

    public $name;
    
    public $email;
    
    public $current_password;
    
    public $new_password;
    
    public $new_password_confirmation;
    
    
    public function mount()
    {
        $this->form->fill([
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
        ]);
    }
    
    public function submit()
    {
        $this->form->getState();
        
        $state = array_filter([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->new_password ? Hash::make($this->new_password) : null,
        ]);
        
        $user = auth()->user();
        
        $user->update($state);
        
        if ($this->new_password) {
            $this->updateSessionPassword($user);
        }
        
        $this->reset(['current_password', 'new_password', 'new_password_confirmation']);
        $this->notify('success', 'Your profile has been updated.');
    }
    
    protected function updateSessionPassword($user)
    {
        request()->session()->put([
            'password_hash_' . auth()->getDefaultDriver() => $user->getAuthPassword(),
        ]);
    }
    
    public function getCancelButtonUrlProperty()
    {
        return static::getUrl();
    }
    
    protected function getBreadcrumbs(): array
    {
        return [
            url()->current() => 'Profil Perusahaan',
        ];
    }
    
    protected function getFormSchema(): array
    {
        return [
            Section::make('General')
            ->columns(2)
            ->schema([
                TextInput::make('name')
                ->required(),
                TextInput::make('email')
                ->label('Email Address')
                ->required(),
            ]),
            Section::make('Update Password')
            ->columns(2)
            ->schema([
                TextInput::make('current_password')
                ->label('Current Password')
                ->password()
                ->rules(['required_with:new_password'])
                ->currentPassword()
                ->autocomplete('off')
                ->columnSpan(1),
                Grid::make()
                ->schema([
                    TextInput::make('new_password')
                    ->label('New Password')
                    ->password()
                    ->rules(['confirmed'])
                    ->autocomplete('new-password'),
                    TextInput::make('new_password_confirmation')
                    ->label('Confirm Password')
                    ->password()
                    ->rules([
                        'required_with:new_password',
                        ])
                        ->autocomplete('new-password'),
                    ]),
                ]),
            ];
        }
        protected static string $view = 'filament.pages.user-profile';
    }
