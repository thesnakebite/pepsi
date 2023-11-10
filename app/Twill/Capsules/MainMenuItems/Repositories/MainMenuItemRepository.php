<?php

namespace App\Twill\Capsules\MainMenuItems\Repositories;

use A17\Twill\Repositories\Behaviors\HandleNesting;
use A17\Twill\Repositories\ModuleRepository;
use App\Twill\Capsules\MainMenuItems\Models\MainMenuItem;

class MainMenuItemRepository extends ModuleRepository
{
    use HandleNesting;

    protected $relatedBrowsers = ['pages'];

    public function __construct(MainMenuItem $model)
    {
        $this->model = $model;
    }

    public function filter($query, array $scopes = [])
    {
        $likeOperator = $this->getLikeOperator();

        foreach ($this->traitsMethods(__FUNCTION__) as $method) {
            $this->$method($query, $scopes);
        }

        unset($scopes['search']);

        if (isset($scopes['exceptIds'])) {
            $query->whereNotIn($this->model->getTable() . '.id', $scopes['exceptIds']);
            unset($scopes['exceptIds']);
        }

        foreach ($scopes as $column => $value) {
            if (method_exists($this->model, 'scope' . ucfirst($column))) {
                $query->$column($value);
            } else {
                if (is_array($value)) {
                    $query->whereIn($column, $value);
                } elseif ($column[0] == '%') {
                    $value && ($value[0] == '!') ? $query->where(substr($column, 1), "not $likeOperator", '%' . substr($value, 1) . '%') : $query->where(substr($column, 1), $likeOperator, '%' . $value . '%');
                } elseif (isset($value[0]) && $value[0] == '!') {
                    $query->where($column, '<>', substr($value, 1));
                } elseif ($value !== '') {
                    $query->where($column, $value);
                }
            }
        }

        return $query;
    }
}
