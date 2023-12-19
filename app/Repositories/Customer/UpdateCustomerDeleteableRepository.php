<?php

namespace App\Repositories\Customer;

use Exception;

use App\Models\Customer;

class UpdateCustomerDeleteableRepository
{
    /**
     * Update customer deleteable
     * @param int $id
     * @param bool $deleteable
     */
    public function updateCustomerDeleteable(int $id, bool $deleteable) {
        try {
            $customer = Customer::find($id);
            $customer->deleteable = $deleteable;
            $customer->save();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
