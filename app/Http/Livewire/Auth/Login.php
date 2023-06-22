<?php
 
namespace App\Http\Livewire\Auth;
 
use Filament\Facades\Filament;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Illuminate\Validation\ValidationException;
use Filament\Http\Livewire\Auth\Login as DefaultLogin;
use Filament\Http\Responses\Auth\Contracts\LoginResponse;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
 
class Login extends DefaultLogin
{
    public $username = '';

    public function authenticate(): ?LoginResponse
    {
        try {
            $this->rateLimit(5);
        } catch (TooManyRequestsException $exception) {
            throw ValidationException::withMessages([
                'username' => __('filament::login.messages.throttled', [
                    'seconds' => $exception->secondsUntilAvailable,
                    'minutes' => ceil($exception->secondsUntilAvailable / 60),
                ]),
            ]);
        }

        $data = $this->form->getState();

        if (! Filament::auth()->attempt([
            'username' => $data['username'],
            'password' => $data['password'],
            'is_active' => 1,
        ], $data['remember'])) {
            throw ValidationException::withMessages([
                'username' => __('filament::login.messages.failed'),
            ]);
        }

        session()->regenerate();

        return app(LoginResponse::class);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('username')
                ->label(__('filament::login.fields.username.label'))
                ->placeholder(__('filament::login.fields.username.placeholder'))
                ->required()
                ->autofocus()
                ->disableAutocomplete(),
            TextInput::make('password')
                ->label(__('filament::login.fields.password.label'))
                ->placeholder(__('filament::login.fields.password.placeholder'))
                ->password()
                ->required(),
            Checkbox::make('remember')
                ->label(__('filament::login.fields.remember.label')),
        ];
    } 
}
