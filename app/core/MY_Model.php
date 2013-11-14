<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * MY_Model
 *
 * Extended the core CI_Model class in order to add more functions based on
 * active record pattern
 *
 */
class MY_Model extends CI_Model
{
    /**
     * @var string
     */
    protected $table;

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var object
     */
    protected $ci;

    /**
     * @var array
     */
    private $fields = array();

    /**
     * @var null|int
     */
    private $numRows = null;

    /**
     * @var int|null
     */
    private $insertId = null;

    /**
     * @var null|array
     */
    private $affectedRows = null;

    /**
     * @var bool
     */
    private $isReturnAsArray   = true;

    /**
     * @param $table
     * @param string $primaryKey
     */
    public function loadTable($table, $primaryKey = 'id')
	{
		$this->table      = $table;
		$this->fields    = $this->db->list_fields($table);
		$this->primaryKey = $primaryKey;
        $this->ci         =& get_instance();
	}

    /**
     * @param null $conditions
     * @param string $fields
     * @param null $order
     * @param int $start
     * @param null $limit
     * @return mixed
     */
    public function findAll($conditions = null, $fields = '*', $order = null, $start = 0, $limit = null)
	{
		if ($conditions != null)  {
			if(is_array($conditions)) {
				$this->db->where($conditions);
			} else {
				$this->db->where($conditions, null, false);
			}
		}

		if ($fields != null)  {
			$this->db->select($fields);
		}

		if ($order != null) {
			$this->db->order_by($order);
		}

		if ($limit != null)  {
			$this->db->limit($limit, $start);
		}

		$query         = $this->db->get($this->table);
		$this->numRows = $query->num_rows();

		return ($this->isReturnAsArray)? $query->result_array() : $query->result();
	}

    /**
     * @param null $conditions
     * @param string $fields
     * @param null $order
     * @return bool
     */
    public function find($conditions = null, $fields = '*', $order = null)
	{
		$data = $this->findAll($conditions, $fields, $order, 0, 1);

		if(empty($data)) {
            return false;
		} else  {
            return $data[0];			
		}
	}

    /**
     * @param null $conditions
     * @param $name
     * @param string $fields
     * @param null $order
     * @return bool
     */
    public function field($conditions = null, $name, $fields = '*', $order = null)
	{
		$data = $this->findAll($conditions, $fields, $order, 0, 1);

		if ($data) {
			$row = $data[0];
			if (isset($row[$name])) {
				return $row[$name];
			}
		}

		return false;
	}

    /**
     * @param null $conditions
     * @return bool
     */
    public function findCount($conditions = null)
	{
		$data = $this->findAll($conditions, 'COUNT(*) AS count', null, 0, 1);

		if (!empty($data)) {
			return $data[0]['count'];
		} else {
			return false;
		}
	}

    /**
     * @param null $data
     * @return bool
     */
    public function insert($data = null)
	{
		if ($data == null) return false;

		foreach ($data as $key => $value)
        {
			if (array_search($key, $this->fields) === false) {
				unset($data[$key]);
			}
		}

		$this->db->insert($this->table, $data);
		$this->insertId = $this->db->insert_id();

		return $this->insertId;
	}

    /**
     * @param null $data
     * @param null $id
     * @return bool|null
     */
    public function update($data = null,
                           $id   = null)
	{
		if ($data == null) return false;

		foreach ($data as $key => $value)
        {
			if (array_search($key, $this->fields) === false) {
				unset($data[$key]);
			}
		}

		if ($id !== null) {
			$this->db->where($this->primaryKey, $id);
			$this->db->update($this->table, $data);
			$this->affectedRows = $this->db->affected_rows();

			return $id;
		} else {
			$this->db->insert($this->table, $data);
			$this->insertId = $this->db->insert_id();

			return $this->insertId;
		}
	}

    /**
     * @param null $id
     * @return bool
     */
    public function remove($id = null)
	{
		if ($id == null) return false;
		return $this->db->delete($this->table, array($this->primaryKey => $id));
	}

    /**
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call ($method, $args)
	{
		$watch = array('findBy','findAllBy');

		foreach ($watch as $found)
        {
			if (stristr($method, $found)) {
				$field = strtolower(str_replace($found, '', $method));
				return $this->$found($field, $args);
			}
		}
	}

    /**
     * @param $field
     * @param $value
     * @return bool
     */
    public function findBy($field, $value)
	{
		$where = array($field => $value);
		return $this->find($where);
	}

    /**
     * @param $field
     * @param $value
     * @return mixed
     */
    public function findAllBy($field, $value)
	{
		$where = array($field => $value);
		return $this->findAll($where);
	}

    /**
     * @param $sql
     * @return mixed
     */
    public function executeQuery($sql)
	{
		return $this->db->query($sql);
	}

    /**
     * @return mixed
     */
    public function getLastQuery()
	{
		return $this->db->last_query();
	}

    /**
     * @param $data
     * @return mixed
     */
    public function getInsertString($data)
	{
		return $this->db->insert_string($this->table, $data);
	}

    /**
     * @return array
     */
    public function getFields()
	{
		return $this->fields;
	}

    /**
     * @return null
     */
    public function getNumRows()
	{
		return $this->numRows;
	}

    /**
     * @return null
     */
    public function getInsertId()
	{
		return $this->insertId;
	}

    /**
     * @return null
     */
    public function getAffectedRows()
	{
		return $this->affectedRows;
	}

    /**
     * @param $primaryKey
     */
    public function setPrimaryKey($primaryKey)
	{
		$this->primaryKey = $primaryKey;
	}

    /**
     * @param $returnArray
     */
    public function setReturnArray($returnArray = false)
	{
		$this->isReturnAsArray = $returnArray;
	}

    /**
     * @param array $data
     * @return array
     */
    protected function removeNonAttributeFields($data = array())
    {
        foreach ($data as $key => $value)
        {
            if (array_search($key, $this->fields) === false) {
                unset($data[$key]);
            }
        }

        return $data;
    }
}