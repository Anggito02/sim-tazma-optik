<?php

namespace App\Services\Modules\Retur;

use Exception;
use Illuminate\Http\Request;

use App\DTO\Modules\ReturDTOs\EditReturDTO;

use App\Repositories\Modules\Retur\EditReturRepository;

class EditReturService {
    public function __construct(
        private EditReturRepository $returRepository
    ) {}

    /**
     * Edit retur
     * @param Request $request
     * @return EditReturDTO
     */
    public function editRetur(Request $request) {
        try {
            // Validate request
            $request->validate([
                'id' => 'required|exists:item_outgoings,id',
                'tanggal_pengiriman' => 'required|date|after_or_equal:today',

                'branch_id' => 'required|exists:branches,id',

                'checked_by' => 'required|exists:users,id',
                'approved_by' => 'required|exists:users,id',
                'delivered_by' => 'required|exists:users,id',
                'received_by' => 'nullable|exists:users,id',
            ]);

            $editReturDTO = new EditReturDTO(
                $request->id,
                $request->tanggal_pengiriman,

                $request->branch_id,

                $request->checked_by,
                $request->approved_by,
                $request->delivered_by,
                $request->received_by,
            );

            $returDTO = $this->returRepository->editRetur($editReturDTO);

            return $returDTO;
        } catch (Exception $error) {
            throw new Exception($error->getMessage());
        }
    }
}

?>
