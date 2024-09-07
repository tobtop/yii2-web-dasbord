<?php

/**
 * Created by Pongpon Nilaphruek
 */

namespace common\components;

use yii\filters\AccessRule;

class MyRule extends AccessRule
{
    protected function matchRole($user)
    {
        //all users can access if you did not send any role.
        if (empty($this->roles)) {
            return true;
        }

        //if you send some roles, we will check.
        foreach ($this->roles as $role) {
            if ($role === '?') {
                if ($user->getIsGuest()) {
                    return true;
                }
            } else if ($role === '@') {
                if (!$user->getIsGuest()) {
                    return true;
                }
            } else if (!$user->getIsGuest() && $role === $user->identity->role) {
                return true;
            }
        }
        return false;
    }
}
