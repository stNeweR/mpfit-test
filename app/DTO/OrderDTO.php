<?php

namespace App\DTO;

use Illuminate\Http\Request;

class OrderDTO
{
    private string $customer_name;
    private int $count;
    private string $comment;

    public function __construct(string $customerName, int $count, string $comment)
    {
        $this->setCustomerName($customerName);
        $this->setCount($count);
        $this->setComment($comment);
    }

    public static function fromRequest(Request $request): OrderDTO
    {
        return new static(
            $request->get('customer_name'),
            $request->get('count'),
            $request->get('comment'),
        );
    }

    public function setCustomerName(string $customerName)
    {
        $this->customer_name = $customerName;
    }

    public function setCount(int $count)
    {
        $this->count = $count;
    }

    public function setComment(string $comment)
    {
        $this->comment = $comment;
    }

    public function getCustomerName()
    {
        return $this->customer_name;
    }

    public function getCount()
    {
        return $this->count;
    }

    public function getComment()
    {
        return $this->comment;
    }
}
