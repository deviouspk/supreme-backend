<?php

namespace Modules\Settings\Services;

use Modules\Settings\Entities\Settings;
use Modules\Settings\Events\SettingsWasCreatedEvent;
use Modules\Settings\Events\SettingsWasUpdatedEvent;
use Modules\Settings\Events\SettingsWasDeletedEvent;
use Modules\Settings\Contracts\SettingsServiceContract;
use Modules\Settings\Dtos\CreateSettingsData;
use Modules\Settings\Dtos\UpdateSettingsData;
use Modules\Settings\Contracts\SettingsRepositoryContract;
use Illuminate\Database\Eloquent\Collection;
use Modules\User\Entities\User;

class SettingsService implements SettingsServiceContract
{

    /**
     * @var SettingsRepositoryContract
     */
    protected $repository;

    /**
     * SettingsService constructor.
     * @param $repository
     */
    public function __construct(SettingsRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param $id
     * @return Settings
     */
    public function find($id): Settings
    {
        return $this->repository->findOrResolve($id);
    }

    /**
     * @param $user
     * @return Settings[]
     */
    public function fromUser($user): Collection
    {
        if ($user instanceof User)
            $user = $user->id;
        return $this->repository->findByField('user_id', $user)->get();
    }

    /**
     * @param $id
     * @param UpdateSettingsData $data
     * @return Settings
     */
    public function update($id, UpdateSettingsData $data): Settings
    {
        $settings = $this->repository->update($id, $data->toArray());
        event(new SettingsWasUpdatedEvent($settings));
        return $settings;
    }

    /**
     * @param CreateSettingsData $data
     * @return Settings
     */
    public function create(CreateSettingsData $data, User $user): Settings
    {
        $data->with('user_id', $user->id);
        $settings = $this->repository->create($data->toArray());
        event(new SettingsWasCreatedEvent($settings));
        return $settings;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        $settings = $this->repository->findOrResolve($id);
        $deleted = $this->repository->delete($settings);
        if($deleted)
            event(new SettingsWasDeletedEvent($settings));
        return $deleted;
    }
}