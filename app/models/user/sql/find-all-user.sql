SELECT
    users.id,
    users.email,
    users.username,
    users.password,
    users.firstname,
    users.lastname,
    users.dob,
    users.city,
    users.zipcode,
    users.address,
    users.created_at,
    country.id AS country_id,
    country.name AS country_name,
    country.code AS country_code,
    status.id AS status_id,
    status.name AS status_name
FROM
    users
        INNER JOIN
    country ON users.country = country.id
        INNER JOIN
    status ON users.status = status.id
