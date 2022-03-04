<?php

namespace PHP\Builder;

function main()
{
    echo (new MysqlQueryBuilder)
        ->select('cdb_user', ['name','email'])
        ->where('age >', 18)
        ->where('gender =', 1)
        ->orderBy('bid DESC')
        ->limit(0, 10)
        ->getSQL();
}

interface QueryBuilder
{
    public function select(string $table, array $fields): QueryBuilder;

    public function where(string $filed, $value): QueryBuilder;

    public function orderBy(string $orderBy): QueryBuilder;

    public function limit(int $offset, int $pageSize): QueryBuilder;

    public function getSQL(): string;
}
 

class MysqlQueryBuilder implements QueryBuilder
{
    protected $query;

    protected function reset(): void
    {
        $this->query = [];
    }

    public function select(string $table, array $fields = []): QueryBuilder
    {
        $this->reset();
        $this->query['table'] = $table;
        $this->query['fields'] = $fields;

        return $this;
    }

    public function where(string $filed, $value): QueryBuilder
    {
        $this->query['where'][] = $filed . $value;
        return $this;
    }

    public function orderBy(string $orderBy): QueryBuilder
    {
        $this->query['orderBy'] = $orderBy;
        return $this;
    }

    public function limit(int $offset, int $pageSize): QueryBuilder
    {
        $this->query['limit'] = "$offset,$pageSize";
        return $this;
    }

    public function getSQL(): string
    {
        $where = implode(' AND ', $this->query['where']);
        $fields = implode(',', $this->query['fields']);
        return sprintf("SELECT %s FROM %s WHERE %s ORDER BY %s LIMIT %s",
            $fields,
            $this->query['table'],
            $where,
            $this->query['orderBy'],
            $this->query['limit']
        );
    }
}

main();
