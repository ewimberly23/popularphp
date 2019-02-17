<?php

namespace app\commands;

use yii\console\ExitCode;
use app\resources\GitHub;
use app\models\Repo;
use app\helpers\Util;

/**
 * This command fetches data from the GitHub api and stores
 * it in a database.
 *
 * @author Evan Wimberly <ewimberly23@gmail.com>
 */
class GitHubController extends \yii\console\Controller
{
    /**
     * This command fetches data from the GitHub api and stores
     * it in a database table.
     * @return int Exit code
     */
    public function actionIndex()
    {
        $url = "https://api.github.com/search/repositories?q=php+topic:php+is:public&sort=stars&order=desc";
        $gitHub = new GitHub($url);

        foreach($gitHub->fetchRow() as $rec) {
            if (($model = Repo::findOne(['repo_id' => $rec->id])) !== null) {

                // update record
                $model->name = $rec->name;
                $model->url = $rec->html_url;
                $model->last_push_date = Util::makeMysqlFriendlyDate($rec->pushed_at);
                $model->description = $rec->description;
                $model->star_count = $rec->stargazers_count;
            }
            else {

                // create new record
                $model = new Repo();
                $model->repo_id = $rec->id;
                $model->name = $rec->name;
                $model->url = $rec->html_url;
                $model->created_date = Util::makeMysqlFriendlyDate($rec->created_at);
                $model->last_push_date = Util::makeMysqlFriendlyDate($rec->pushed_at);
                $model->description = $rec->description;
                $model->star_count = $rec->stargazers_count;
            }

            if (! $model->save()) {
                print_r($model->getErrors());
                return ExitCode::TEMPFAIL;
            }
        }

        return ExitCode::OK;
    }
}
