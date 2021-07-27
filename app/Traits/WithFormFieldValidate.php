<?php

namespace App\Traits;

trait WithFormFieldValidate
{
	public function formValidate($forms)
	{
		return $this->validate(
			collect($forms)->mapWithKeys(fn($item) => [$item['name'] => $item['validation_rules']])->all(),
			collect($forms)->mapWithKeys(fn($item) => $item['validation_messages'] ?? [])->all(),
			collect($forms)->mapWithKeys(fn($item) => [$item['name'] => $item['validation_attribute'] ?? $item['name']])->all()
		);
	}
}
