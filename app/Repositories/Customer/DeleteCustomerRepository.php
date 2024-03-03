<?php

namespace App\Repositories\Customer;

use Exception;

use App\Models\Customer;

class DeleteCustomerRepository
{
    /**
     * Delete customer
     * @param int $id
     */
    public function deleteCustomer(int $id) {
        try {
            $customer = Customer::find($id);

            if($customer->deleteable == FALSE) {
                throw new Exception('Customer tidak bisa dihapus');
            }

            $customer->delete();

            return $customer;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}

?>
