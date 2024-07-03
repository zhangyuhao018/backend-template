<?php namespace App\Repositories\Base;

use App\Utils\TableConstants;
use Illuminate\Support\Facades\Auth;

abstract class BaseRepository
{

    protected function simpleCreate($model, $attributes, $withBaseParam = true)
    {
        if ($withBaseParam) {
            $this->setBaseInsParam($model);
        }
        $model->fill($attributes)->save();
    }

    protected function simpleUpdate(
      $model,
      $attributes = null,
      $withBaseParam = true
    ) {
        if ($withBaseParam) {
            $this->setBaseUpdParam($model);
        }
        if (empty($attributes)) {
            $model->save();
        } else {
            $model->update($attributes);
        }
    }

    protected function setBaseInsParam($model)
    {
        $model[TableConstants::KEY_CREATOR_ID] = Auth::id();
        $model[TableConstants::KEY_UPDATER_ID] = Auth::id();

        return $model;
    }

    protected function setBaseUpdParam($model)
    {
        $model[TableConstants::KEY_UPDATER_ID] = Auth::id();

        return $model;
    }

    protected function getDateBetweenSql(
      $query,
      $column,
      $dateStart = null,
      $dateEnd = null
    ) {
        if (!empty($dateStart)) {
            $query = $query->where($column, '>=', $dateStart);
        }
        if (!empty($dateEnd)) {
            $query = $query->where($column, '<=', $dateEnd);
        }

        return $query;
    }
}
