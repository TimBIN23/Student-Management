<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Filament\Widgets\StatsOverview;

class Dashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';

    protected static string $view = 'filament.pages.dashboard'; // Optional, just if you want to customize the view.

    public function getHeaderWidgets(): array
    {
        return [
            StatsOverview::class, // This will show the StatsOverview widget in the header.
        ];
    }
}
