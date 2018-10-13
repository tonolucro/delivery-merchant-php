<?php
namespace Tonolucro\Delivery\Merchant\Http;

class Query
{
    const SORT_ASC = "ASC";
    const SORT_DESC = "DESC";

    /**
     * @var \ArrayObject
     */
    protected $filters = null;
    /**
     * @var \ArrayObject
     */
    protected $sorts = null;
    /**
     * @var int
     */
    protected $page_number = 0;
    /**
     * @var int
     */
    protected $page_size = 0;

    /**
     * Query constructor.
     * @return $this
     */
    public function __construct()
    {
        $this->filters = new \ArrayObject();
        $this->sorts = new \ArrayObject();
        return $this;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $query = [];
        if( count($this->filters) > 0 ){
            $query['filter'] = $this->filters->getArrayCopy();
        }
        if( count($this->sorts) > 0 ){
            $query['sort'] = $this->sorts->getArrayCopy();
        }
        if( $this->page_number > 0 ){
            $query['page']['number'] = $this->page_number;
        }
        if( $this->page_size > 0 ){
            $query['page']['size'] = $this->page_size;
        }

        return $query;
    }

    /**
     * @param string $key
     * @param string $value
     * @return $this
     */
    public function addFilter($key, $value){
        $this->filters[ $key ] = $value;
        return $this;
    }

    /**
     * @return \ArrayObject
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * @param string $key
     * @param string $const_query_sort
     * @return $this
     */
    public function addSort($key, $const_query_sort){
        $this->sorts[ $key ] = $const_query_sort;
        return $this;
    }

    /**
     * @return \ArrayObject
     */
    public function getSorts()
    {
        return $this->sorts;
    }

    /**
     * @param int $number
     * @param int $size
     */
    public function setPage($number, $size=0)
    {
        $this->page_number = $number;
        $this->page_size = $size;
    }
}