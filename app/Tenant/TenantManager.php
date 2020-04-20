<?php

declare(strict_types=1);

namespace App\Tenant;

use App\Models\Company;
use Illuminate\Database\Schema\Blueprint;

class TenantManager
{
    private $tenant;
    private static $tenantTable = 'companies';
    private static $tenantField = 'company_id';
    private static $tenantModel = Company::class;

    /**
     * @return Company
     */
    public function getTenant(): ?Company //null or Company
    {
        return $this->tenant;
    }

    /**
     * @param Company $tenant
     */
    public function setTenant(?Company $tenant): void
    {
        $this->tenant = $tenant;
    }

    /**
     * @return string
     */
    public static function getTenantTable(): string
    {
        return self::$tenantTable;
    }

    /**
     * @return string
     */
    public static function getTenantField(): string
    {
        return self::$tenantField;
    }

    /**
     * @return Company
     */
    public static function getTenantModel(): string
    {
        return self::$tenantModel;
    }

    public function bluePrintMacros()
    {
        Blueprint::macro('tenant', function () {
            $this->integer(TenantManager::getTenantField())
                ->unsigned();
            $this->foreign(TenantManager::getTenantField())
                ->references('id')
                ->on(TenantManager::getTenantTable());
        });
    }
}
