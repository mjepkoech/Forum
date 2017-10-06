<?php
namespace App\Filters;
use App\User;
use Illuminate\Http\Request;

class ThreadFilters extends Filters
{
    protected $filters=['by', 'popular'];
    /**
     * @param string $username
     * filter the query by the given username
     * @return mixed
     */
    protected function by($username)
    {
        $user = User::where('name', $username)->firstOrFail();

        return $this->builder->where('user_id', $user->id);
    }

    /**
     * Filter the query according to most popular threads.
     *
     * @return $this
     */
    protected function popular()
    {
        $this->builder->getQuery()->orders = [];
        return $this->builder->orderBy('replies_count', 'desc');
    }
}