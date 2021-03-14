<?

namespace Igorsgm\TibiaDataApi\Models\Guilds;

use Igorsgm\TibiaDataApi\Traits\ImmutableTrait;
use Igorsgm\TibiaDataApi\Traits\SerializableTrait;
use JsonSerializable;

class Guild implements JsonSerializable
{
    use ImmutableTrait, SerializableTrait;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $logo_url;

    /**
     * @var bool
     */
    private $is_active;

    /**
     * Guild constructor.
     * @param  string  $name
     * @param  string  $description
     * @param  string  $logo_url
     * @param  bool  $is_active
     * @throws \Igorsgm\TibiaDataApi\Exceptions\ImmutableException
     */
    public function __construct(string $name, string $description, string $logo_url, bool $is_active)
    {
        $this->handleImmutableConstructor();

        $this->name = $name;
        $this->description = $description;
        $this->logo_url = $logo_url;
        $this->is_active = $is_active;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getLogoUrl(): string
    {
        return $this->logo_url;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->is_active;
    }

}
