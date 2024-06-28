<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ApiCompanies extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->getName(),
            'email' => $this->email,
            'website' => $this->getName(),
            'action' => $this->getAction(),
        ];
    }

    private function getAction() {
        $links = '<a href="'.route('view.data.employees', $this->id).'" class="btn btn-success">View Detail</a>';
        if(Auth::user()->role == 'superadmin') {
            $links .= '<a href="'.route('view.data.employees', $this->id).'" class="btn btn-success">View Detail</a>';
            $links .= '<a href="'. route('edit.data.companies', $this->id) .'" class="btn btn-primary">Edit</a>';
            $links .= '<a href="'. route('delete.data.companies', $this->id) .'" class="btn btn-danger" id="id-delete">Delete</a>';
        }
        return $links;
    }

    private function getName() {
        return '<img src="'. asset('storage/imagesLogo/' . $this->logo).'" alt="" srcset="" style="width: 40px; heigt: 40px;">'.$this->name;
    }
}