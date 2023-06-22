<?php

namespace App\Tables\Columns;

use Closure;

use Filament\Tables\Columns\TextColumn;

class CurrencyColumn extends TextColumn
{
    protected string $view = 'tables.columns.currency-column';
}
