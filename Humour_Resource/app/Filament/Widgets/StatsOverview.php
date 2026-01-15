<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use App\Models\CoachingService;
use App\Models\Lead;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Leads', Lead::count())
                ->description('Potential Clients')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success')
                ->icon('heroicon-m-users'),
            
            Stat::make('Published Stories', Article::count())
                ->description('Content Archive')
                ->descriptionIcon('heroicon-m-document-text')
                ->color('warning')
                ->icon('heroicon-m-document-text'),

            Stat::make('Active Services', CoachingService::count())
                ->description('Current Offerings')
                ->icon('heroicon-m-briefcase'),
        ];
    }
}
