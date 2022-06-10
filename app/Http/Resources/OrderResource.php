<?php

namespace App\Http\Resources;

use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $orderdetails = OrderDetail::where('order_id', $this->id)->get();
        return [
            "id" => $this->id,
            "order_detail" => OrderDetailResource::collection($orderdetails),
            "status" => $this->order_status,
            "payment_method" => $this->payment_method,
            "shipment" => $this->shipment,
        ];
    }
}
