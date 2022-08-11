<?php

namespace App\ValueObjects;

use App\Models\Attribute;
use App\Models\CatalogUnit;
use RuntimeException;

class CartObject
{
    private array $relations = [];

    public function __construct(private array $items=[]) {}

    public function add(CatalogUnit $item, ?int $relatedID=null): static
    {
        if ($item->type === 'Service') {
            if ($relatedID === null) {
                throw new RuntimeException('Services cannot be added without a related product');
            }

            $this->relations[$relatedID][] = $item->id;
        }

        $this->items[] = $item;
        return $this;
    }

    public function remove(mixed $id): static
    {
        unset($this->items[$id]);

        if (isset($this->relations[$id])) {
            $this->items = array_filter($this->items, function($i) use ($id) {
                return !in_array($i->id, $this->relations[$id], true);
            });

            unset($this->relations[$id]);
        }

        $this->items = array_values($this->items);
        return $this;
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function calculatePrice(): int
    {
        return array_sum(array_map(function($item) {
            return $item->price;
        }, $this->items));
    }
}
