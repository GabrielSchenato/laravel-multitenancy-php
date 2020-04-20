<?php

declare(strict_types=1);

namespace App\Listeners;

use Illuminate\Support\Arr;

class SectionGuardManager
{
    private $authGuards = [
        'admin_web', 'app_web'
    ];

    private $guardsLogged = [];
    private $guardsLoggedOut = [];

    public function hasAuthGuard(string $guard): bool
    {
        return in_array($guard, $this->authGuards);
    }

    public function hasGuardLogged(string $guard): bool
    {
        return in_array($guard, $this->guardsLogged);
    }

    public function hasGuardLoggedOut(string $guard): bool
    {
        return in_array($guard, $this->guardsLoggedOut);
    }

    public function exceptGuard(string $guard = null): array
    {
        return Arr::except($this->authGuards, $guard);
    }

    public function getGuardsLogged(): array
    {
        return $this->guardsLogged;
    }

    public function addGuardsLogged(string $guard): void
    {
        $this->guardsLogged[] = $guard;
    }

    public function removeGuardsLogged(string $guard): void
    {
        Arr::forget($this->guardsLogged, $guard);
    }

    public function getGuardsLoggedOut(): array
    {
        return $this->guardsLoggedOut;
    }

    public function addGuardsLoggedOut(string $guard): void
    {
        $this->guardsLoggedOut[] = $guard;
    }

    public function removeGuardsLoggedOut(string $guard): void
    {
        Arr::forget($this->guardsLoggedOut, $guard);
    }
}
