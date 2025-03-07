<?php

/**
 * @copyright Copyright (C) 2015-2022 AIZAWA Hina
 * @license https://github.com/fetus-hina/stat.ink/blob/master/LICENSE MIT
 * @author AIZAWA Hina <hina@fetus.jp>
 */

declare(strict_types=1);

namespace app\components\formatters\api\v3;

use app\models\BattlePlayer3;

final class BattlePlayerApiFormatter
{
    /**
     * @param BattlePlayer3[]|null $models
     */
    public static function toJson(?array $models, bool $fullTranslate = false): ?array
    {
        if (!$models) {
            return null;
        }

        return \array_values(
            \array_map(
                fn (BattlePlayer3 $model): array => [
                    'me' => $model->is_me,
                    'rank_in_team' => $model->rank_in_team,
                    'name' => $model->name,
                    'number' => $model->number,
                    'splashtag_title' => SplashtagTitleApiFormatter::toJson($model->splashtagTitle),
                    'weapon' => WeaponApiFormatter::toJson($model->weapon, $fullTranslate),
                    'kill' => $model->kill,
                    'assist' => $model->assist,
                    'kill_or_assist' => $model->kill_or_assist,
                    'death' => $model->death,
                    'special' => $model->special,
                    'inked' => $model->inked,
                    'disconnected' => $model->is_disconnected,
                ],
                $models
            )
        );
    }
}
