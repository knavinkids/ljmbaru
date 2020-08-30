<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BrgItem extends JsonResource
{
	public function toArray($request)
	{
		return [
			'kode' => $this->kode,
			'jenis' => $this->jenis,
			'nama' => $this->nama,
			'merk' => $this->merk
		];
	}
}
