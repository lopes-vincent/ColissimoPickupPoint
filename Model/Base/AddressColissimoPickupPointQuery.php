<?php

namespace ColissimoPickupPoint\Model\Base;

use \Exception;
use \PDO;
use ColissimoPickupPoint\Model\AddressColissimoPickupPoint as ChildAddressColissimoPickupPoint;
use ColissimoPickupPoint\Model\AddressColissimoPickupPointQuery as ChildAddressColissimoPickupPointQuery;
use ColissimoPickupPoint\Model\Map\AddressColissimoPickupPointTableMap;
use ColissimoPickupPoint\Model\Thelia\Model\Country;
use ColissimoPickupPoint\Model\Thelia\Model\CustomerTitle;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'address_colissimo_pickup_point' table.
 *
 *
 *
 * @method     ChildAddressColissimoPickupPointQuery orderById($order = Criteria::ASC) Order by the id column
 * @method     ChildAddressColissimoPickupPointQuery orderByTitleId($order = Criteria::ASC) Order by the title_id column
 * @method     ChildAddressColissimoPickupPointQuery orderByCompany($order = Criteria::ASC) Order by the company column
 * @method     ChildAddressColissimoPickupPointQuery orderByFirstname($order = Criteria::ASC) Order by the firstname column
 * @method     ChildAddressColissimoPickupPointQuery orderByLastname($order = Criteria::ASC) Order by the lastname column
 * @method     ChildAddressColissimoPickupPointQuery orderByAddress1($order = Criteria::ASC) Order by the address1 column
 * @method     ChildAddressColissimoPickupPointQuery orderByAddress2($order = Criteria::ASC) Order by the address2 column
 * @method     ChildAddressColissimoPickupPointQuery orderByAddress3($order = Criteria::ASC) Order by the address3 column
 * @method     ChildAddressColissimoPickupPointQuery orderByZipcode($order = Criteria::ASC) Order by the zipcode column
 * @method     ChildAddressColissimoPickupPointQuery orderByCity($order = Criteria::ASC) Order by the city column
 * @method     ChildAddressColissimoPickupPointQuery orderByCountryId($order = Criteria::ASC) Order by the country_id column
 * @method     ChildAddressColissimoPickupPointQuery orderByCode($order = Criteria::ASC) Order by the code column
 * @method     ChildAddressColissimoPickupPointQuery orderByType($order = Criteria::ASC) Order by the type column
 * @method     ChildAddressColissimoPickupPointQuery orderByCellphone($order = Criteria::ASC) Order by the cellphone column
 *
 * @method     ChildAddressColissimoPickupPointQuery groupById() Group by the id column
 * @method     ChildAddressColissimoPickupPointQuery groupByTitleId() Group by the title_id column
 * @method     ChildAddressColissimoPickupPointQuery groupByCompany() Group by the company column
 * @method     ChildAddressColissimoPickupPointQuery groupByFirstname() Group by the firstname column
 * @method     ChildAddressColissimoPickupPointQuery groupByLastname() Group by the lastname column
 * @method     ChildAddressColissimoPickupPointQuery groupByAddress1() Group by the address1 column
 * @method     ChildAddressColissimoPickupPointQuery groupByAddress2() Group by the address2 column
 * @method     ChildAddressColissimoPickupPointQuery groupByAddress3() Group by the address3 column
 * @method     ChildAddressColissimoPickupPointQuery groupByZipcode() Group by the zipcode column
 * @method     ChildAddressColissimoPickupPointQuery groupByCity() Group by the city column
 * @method     ChildAddressColissimoPickupPointQuery groupByCountryId() Group by the country_id column
 * @method     ChildAddressColissimoPickupPointQuery groupByCode() Group by the code column
 * @method     ChildAddressColissimoPickupPointQuery groupByType() Group by the type column
 * @method     ChildAddressColissimoPickupPointQuery groupByCellphone() Group by the cellphone column
 *
 * @method     ChildAddressColissimoPickupPointQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildAddressColissimoPickupPointQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildAddressColissimoPickupPointQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildAddressColissimoPickupPointQuery leftJoinCustomerTitle($relationAlias = null) Adds a LEFT JOIN clause to the query using the CustomerTitle relation
 * @method     ChildAddressColissimoPickupPointQuery rightJoinCustomerTitle($relationAlias = null) Adds a RIGHT JOIN clause to the query using the CustomerTitle relation
 * @method     ChildAddressColissimoPickupPointQuery innerJoinCustomerTitle($relationAlias = null) Adds a INNER JOIN clause to the query using the CustomerTitle relation
 *
 * @method     ChildAddressColissimoPickupPointQuery leftJoinCountry($relationAlias = null) Adds a LEFT JOIN clause to the query using the Country relation
 * @method     ChildAddressColissimoPickupPointQuery rightJoinCountry($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Country relation
 * @method     ChildAddressColissimoPickupPointQuery innerJoinCountry($relationAlias = null) Adds a INNER JOIN clause to the query using the Country relation
 *
 * @method     ChildAddressColissimoPickupPoint findOne(ConnectionInterface $con = null) Return the first ChildAddressColissimoPickupPoint matching the query
 * @method     ChildAddressColissimoPickupPoint findOneOrCreate(ConnectionInterface $con = null) Return the first ChildAddressColissimoPickupPoint matching the query, or a new ChildAddressColissimoPickupPoint object populated from the query conditions when no match is found
 *
 * @method     ChildAddressColissimoPickupPoint findOneById(int $id) Return the first ChildAddressColissimoPickupPoint filtered by the id column
 * @method     ChildAddressColissimoPickupPoint findOneByTitleId(int $title_id) Return the first ChildAddressColissimoPickupPoint filtered by the title_id column
 * @method     ChildAddressColissimoPickupPoint findOneByCompany(string $company) Return the first ChildAddressColissimoPickupPoint filtered by the company column
 * @method     ChildAddressColissimoPickupPoint findOneByFirstname(string $firstname) Return the first ChildAddressColissimoPickupPoint filtered by the firstname column
 * @method     ChildAddressColissimoPickupPoint findOneByLastname(string $lastname) Return the first ChildAddressColissimoPickupPoint filtered by the lastname column
 * @method     ChildAddressColissimoPickupPoint findOneByAddress1(string $address1) Return the first ChildAddressColissimoPickupPoint filtered by the address1 column
 * @method     ChildAddressColissimoPickupPoint findOneByAddress2(string $address2) Return the first ChildAddressColissimoPickupPoint filtered by the address2 column
 * @method     ChildAddressColissimoPickupPoint findOneByAddress3(string $address3) Return the first ChildAddressColissimoPickupPoint filtered by the address3 column
 * @method     ChildAddressColissimoPickupPoint findOneByZipcode(string $zipcode) Return the first ChildAddressColissimoPickupPoint filtered by the zipcode column
 * @method     ChildAddressColissimoPickupPoint findOneByCity(string $city) Return the first ChildAddressColissimoPickupPoint filtered by the city column
 * @method     ChildAddressColissimoPickupPoint findOneByCountryId(int $country_id) Return the first ChildAddressColissimoPickupPoint filtered by the country_id column
 * @method     ChildAddressColissimoPickupPoint findOneByCode(string $code) Return the first ChildAddressColissimoPickupPoint filtered by the code column
 * @method     ChildAddressColissimoPickupPoint findOneByType(string $type) Return the first ChildAddressColissimoPickupPoint filtered by the type column
 * @method     ChildAddressColissimoPickupPoint findOneByCellphone(string $cellphone) Return the first ChildAddressColissimoPickupPoint filtered by the cellphone column
 *
 * @method     array findById(int $id) Return ChildAddressColissimoPickupPoint objects filtered by the id column
 * @method     array findByTitleId(int $title_id) Return ChildAddressColissimoPickupPoint objects filtered by the title_id column
 * @method     array findByCompany(string $company) Return ChildAddressColissimoPickupPoint objects filtered by the company column
 * @method     array findByFirstname(string $firstname) Return ChildAddressColissimoPickupPoint objects filtered by the firstname column
 * @method     array findByLastname(string $lastname) Return ChildAddressColissimoPickupPoint objects filtered by the lastname column
 * @method     array findByAddress1(string $address1) Return ChildAddressColissimoPickupPoint objects filtered by the address1 column
 * @method     array findByAddress2(string $address2) Return ChildAddressColissimoPickupPoint objects filtered by the address2 column
 * @method     array findByAddress3(string $address3) Return ChildAddressColissimoPickupPoint objects filtered by the address3 column
 * @method     array findByZipcode(string $zipcode) Return ChildAddressColissimoPickupPoint objects filtered by the zipcode column
 * @method     array findByCity(string $city) Return ChildAddressColissimoPickupPoint objects filtered by the city column
 * @method     array findByCountryId(int $country_id) Return ChildAddressColissimoPickupPoint objects filtered by the country_id column
 * @method     array findByCode(string $code) Return ChildAddressColissimoPickupPoint objects filtered by the code column
 * @method     array findByType(string $type) Return ChildAddressColissimoPickupPoint objects filtered by the type column
 * @method     array findByCellphone(string $cellphone) Return ChildAddressColissimoPickupPoint objects filtered by the cellphone column
 *
 */
abstract class AddressColissimoPickupPointQuery extends ModelCriteria
{

    /**
     * Initializes internal state of \ColissimoPickupPoint\Model\Base\AddressColissimoPickupPointQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'thelia', $modelName = '\\ColissimoPickupPoint\\Model\\AddressColissimoPickupPoint', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildAddressColissimoPickupPointQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildAddressColissimoPickupPointQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof \ColissimoPickupPoint\Model\AddressColissimoPickupPointQuery) {
            return $criteria;
        }
        $query = new \ColissimoPickupPoint\Model\AddressColissimoPickupPointQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildAddressColissimoPickupPoint|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AddressColissimoPickupPointTableMap::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is already in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(AddressColissimoPickupPointTableMap::DATABASE_NAME);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return   ChildAddressColissimoPickupPoint A model object, or null if the key is not found
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT ID, TITLE_ID, COMPANY, FIRSTNAME, LASTNAME, ADDRESS1, ADDRESS2, ADDRESS3, ZIPCODE, CITY, COUNTRY_ID, CODE, TYPE, CELLPHONE FROM address_colissimo_pickup_point WHERE ID = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            $obj = new ChildAddressColissimoPickupPoint();
            $obj->hydrate($row);
            AddressColissimoPickupPointTableMap::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildAddressColissimoPickupPoint|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return ChildAddressColissimoPickupPointQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AddressColissimoPickupPointTableMap::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return ChildAddressColissimoPickupPointQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AddressColissimoPickupPointTableMap::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAddressColissimoPickupPointQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(AddressColissimoPickupPointTableMap::ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(AddressColissimoPickupPointTableMap::ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressColissimoPickupPointTableMap::ID, $id, $comparison);
    }

    /**
     * Filter the query on the title_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTitleId(1234); // WHERE title_id = 1234
     * $query->filterByTitleId(array(12, 34)); // WHERE title_id IN (12, 34)
     * $query->filterByTitleId(array('min' => 12)); // WHERE title_id > 12
     * </code>
     *
     * @see       filterByCustomerTitle()
     *
     * @param     mixed $titleId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAddressColissimoPickupPointQuery The current query, for fluid interface
     */
    public function filterByTitleId($titleId = null, $comparison = null)
    {
        if (is_array($titleId)) {
            $useMinMax = false;
            if (isset($titleId['min'])) {
                $this->addUsingAlias(AddressColissimoPickupPointTableMap::TITLE_ID, $titleId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($titleId['max'])) {
                $this->addUsingAlias(AddressColissimoPickupPointTableMap::TITLE_ID, $titleId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressColissimoPickupPointTableMap::TITLE_ID, $titleId, $comparison);
    }

    /**
     * Filter the query on the company column
     *
     * Example usage:
     * <code>
     * $query->filterByCompany('fooValue');   // WHERE company = 'fooValue'
     * $query->filterByCompany('%fooValue%'); // WHERE company LIKE '%fooValue%'
     * </code>
     *
     * @param     string $company The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAddressColissimoPickupPointQuery The current query, for fluid interface
     */
    public function filterByCompany($company = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($company)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $company)) {
                $company = str_replace('*', '%', $company);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AddressColissimoPickupPointTableMap::COMPANY, $company, $comparison);
    }

    /**
     * Filter the query on the firstname column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstname('fooValue');   // WHERE firstname = 'fooValue'
     * $query->filterByFirstname('%fooValue%'); // WHERE firstname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAddressColissimoPickupPointQuery The current query, for fluid interface
     */
    public function filterByFirstname($firstname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $firstname)) {
                $firstname = str_replace('*', '%', $firstname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AddressColissimoPickupPointTableMap::FIRSTNAME, $firstname, $comparison);
    }

    /**
     * Filter the query on the lastname column
     *
     * Example usage:
     * <code>
     * $query->filterByLastname('fooValue');   // WHERE lastname = 'fooValue'
     * $query->filterByLastname('%fooValue%'); // WHERE lastname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastname The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAddressColissimoPickupPointQuery The current query, for fluid interface
     */
    public function filterByLastname($lastname = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastname)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lastname)) {
                $lastname = str_replace('*', '%', $lastname);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AddressColissimoPickupPointTableMap::LASTNAME, $lastname, $comparison);
    }

    /**
     * Filter the query on the address1 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress1('fooValue');   // WHERE address1 = 'fooValue'
     * $query->filterByAddress1('%fooValue%'); // WHERE address1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address1 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAddressColissimoPickupPointQuery The current query, for fluid interface
     */
    public function filterByAddress1($address1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address1)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address1)) {
                $address1 = str_replace('*', '%', $address1);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AddressColissimoPickupPointTableMap::ADDRESS1, $address1, $comparison);
    }

    /**
     * Filter the query on the address2 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress2('fooValue');   // WHERE address2 = 'fooValue'
     * $query->filterByAddress2('%fooValue%'); // WHERE address2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAddressColissimoPickupPointQuery The current query, for fluid interface
     */
    public function filterByAddress2($address2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address2)) {
                $address2 = str_replace('*', '%', $address2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AddressColissimoPickupPointTableMap::ADDRESS2, $address2, $comparison);
    }

    /**
     * Filter the query on the address3 column
     *
     * Example usage:
     * <code>
     * $query->filterByAddress3('fooValue');   // WHERE address3 = 'fooValue'
     * $query->filterByAddress3('%fooValue%'); // WHERE address3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $address3 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAddressColissimoPickupPointQuery The current query, for fluid interface
     */
    public function filterByAddress3($address3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($address3)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $address3)) {
                $address3 = str_replace('*', '%', $address3);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AddressColissimoPickupPointTableMap::ADDRESS3, $address3, $comparison);
    }

    /**
     * Filter the query on the zipcode column
     *
     * Example usage:
     * <code>
     * $query->filterByZipcode('fooValue');   // WHERE zipcode = 'fooValue'
     * $query->filterByZipcode('%fooValue%'); // WHERE zipcode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $zipcode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAddressColissimoPickupPointQuery The current query, for fluid interface
     */
    public function filterByZipcode($zipcode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($zipcode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $zipcode)) {
                $zipcode = str_replace('*', '%', $zipcode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AddressColissimoPickupPointTableMap::ZIPCODE, $zipcode, $comparison);
    }

    /**
     * Filter the query on the city column
     *
     * Example usage:
     * <code>
     * $query->filterByCity('fooValue');   // WHERE city = 'fooValue'
     * $query->filterByCity('%fooValue%'); // WHERE city LIKE '%fooValue%'
     * </code>
     *
     * @param     string $city The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAddressColissimoPickupPointQuery The current query, for fluid interface
     */
    public function filterByCity($city = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($city)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $city)) {
                $city = str_replace('*', '%', $city);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AddressColissimoPickupPointTableMap::CITY, $city, $comparison);
    }

    /**
     * Filter the query on the country_id column
     *
     * Example usage:
     * <code>
     * $query->filterByCountryId(1234); // WHERE country_id = 1234
     * $query->filterByCountryId(array(12, 34)); // WHERE country_id IN (12, 34)
     * $query->filterByCountryId(array('min' => 12)); // WHERE country_id > 12
     * </code>
     *
     * @see       filterByCountry()
     *
     * @param     mixed $countryId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAddressColissimoPickupPointQuery The current query, for fluid interface
     */
    public function filterByCountryId($countryId = null, $comparison = null)
    {
        if (is_array($countryId)) {
            $useMinMax = false;
            if (isset($countryId['min'])) {
                $this->addUsingAlias(AddressColissimoPickupPointTableMap::COUNTRY_ID, $countryId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($countryId['max'])) {
                $this->addUsingAlias(AddressColissimoPickupPointTableMap::COUNTRY_ID, $countryId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AddressColissimoPickupPointTableMap::COUNTRY_ID, $countryId, $comparison);
    }

    /**
     * Filter the query on the code column
     *
     * Example usage:
     * <code>
     * $query->filterByCode('fooValue');   // WHERE code = 'fooValue'
     * $query->filterByCode('%fooValue%'); // WHERE code LIKE '%fooValue%'
     * </code>
     *
     * @param     string $code The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAddressColissimoPickupPointQuery The current query, for fluid interface
     */
    public function filterByCode($code = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($code)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $code)) {
                $code = str_replace('*', '%', $code);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AddressColissimoPickupPointTableMap::CODE, $code, $comparison);
    }

    /**
     * Filter the query on the type column
     *
     * Example usage:
     * <code>
     * $query->filterByType('fooValue');   // WHERE type = 'fooValue'
     * $query->filterByType('%fooValue%'); // WHERE type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $type The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAddressColissimoPickupPointQuery The current query, for fluid interface
     */
    public function filterByType($type = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($type)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $type)) {
                $type = str_replace('*', '%', $type);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AddressColissimoPickupPointTableMap::TYPE, $type, $comparison);
    }

    /**
     * Filter the query on the cellphone column
     *
     * Example usage:
     * <code>
     * $query->filterByCellphone('fooValue');   // WHERE cellphone = 'fooValue'
     * $query->filterByCellphone('%fooValue%'); // WHERE cellphone LIKE '%fooValue%'
     * </code>
     *
     * @param     string $cellphone The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAddressColissimoPickupPointQuery The current query, for fluid interface
     */
    public function filterByCellphone($cellphone = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($cellphone)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $cellphone)) {
                $cellphone = str_replace('*', '%', $cellphone);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AddressColissimoPickupPointTableMap::CELLPHONE, $cellphone, $comparison);
    }

    /**
     * Filter the query by a related \ColissimoPickupPoint\Model\Thelia\Model\CustomerTitle object
     *
     * @param \ColissimoPickupPoint\Model\Thelia\Model\CustomerTitle|ObjectCollection $customerTitle The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAddressColissimoPickupPointQuery The current query, for fluid interface
     */
    public function filterByCustomerTitle($customerTitle, $comparison = null)
    {
        if ($customerTitle instanceof \ColissimoPickupPoint\Model\Thelia\Model\CustomerTitle) {
            return $this
                ->addUsingAlias(AddressColissimoPickupPointTableMap::TITLE_ID, $customerTitle->getId(), $comparison);
        } elseif ($customerTitle instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AddressColissimoPickupPointTableMap::TITLE_ID, $customerTitle->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCustomerTitle() only accepts arguments of type \ColissimoPickupPoint\Model\Thelia\Model\CustomerTitle or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the CustomerTitle relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildAddressColissimoPickupPointQuery The current query, for fluid interface
     */
    public function joinCustomerTitle($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('CustomerTitle');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'CustomerTitle');
        }

        return $this;
    }

    /**
     * Use the CustomerTitle relation CustomerTitle object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \ColissimoPickupPoint\Model\Thelia\Model\CustomerTitleQuery A secondary query class using the current class as primary query
     */
    public function useCustomerTitleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCustomerTitle($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'CustomerTitle', '\ColissimoPickupPoint\Model\Thelia\Model\CustomerTitleQuery');
    }

    /**
     * Filter the query by a related \ColissimoPickupPoint\Model\Thelia\Model\Country object
     *
     * @param \ColissimoPickupPoint\Model\Thelia\Model\Country|ObjectCollection $country The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildAddressColissimoPickupPointQuery The current query, for fluid interface
     */
    public function filterByCountry($country, $comparison = null)
    {
        if ($country instanceof \ColissimoPickupPoint\Model\Thelia\Model\Country) {
            return $this
                ->addUsingAlias(AddressColissimoPickupPointTableMap::COUNTRY_ID, $country->getId(), $comparison);
        } elseif ($country instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AddressColissimoPickupPointTableMap::COUNTRY_ID, $country->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByCountry() only accepts arguments of type \ColissimoPickupPoint\Model\Thelia\Model\Country or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Country relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return ChildAddressColissimoPickupPointQuery The current query, for fluid interface
     */
    public function joinCountry($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Country');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Country');
        }

        return $this;
    }

    /**
     * Use the Country relation Country object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \ColissimoPickupPoint\Model\Thelia\Model\CountryQuery A secondary query class using the current class as primary query
     */
    public function useCountryQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCountry($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Country', '\ColissimoPickupPoint\Model\Thelia\Model\CountryQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildAddressColissimoPickupPoint $addressColissimoPickupPoint Object to remove from the list of results
     *
     * @return ChildAddressColissimoPickupPointQuery The current query, for fluid interface
     */
    public function prune($addressColissimoPickupPoint = null)
    {
        if ($addressColissimoPickupPoint) {
            $this->addUsingAlias(AddressColissimoPickupPointTableMap::ID, $addressColissimoPickupPoint->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the address_colissimo_pickup_point table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AddressColissimoPickupPointTableMap::DATABASE_NAME);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            AddressColissimoPickupPointTableMap::clearInstancePool();
            AddressColissimoPickupPointTableMap::clearRelatedInstancePool();

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $affectedRows;
    }

    /**
     * Performs a DELETE on the database, given a ChildAddressColissimoPickupPoint or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or ChildAddressColissimoPickupPoint object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *         rethrown wrapped into a PropelException.
     */
     public function delete(ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(AddressColissimoPickupPointTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(AddressColissimoPickupPointTableMap::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();


        AddressColissimoPickupPointTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            AddressColissimoPickupPointTableMap::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

} // AddressColissimoPickupPointQuery