
# DEVLM 2024.7 - SE RENOMBRO CATEGORY_ID EN LA TABLA PRODUCTO 
ALTER TABLE products DROP FOREIGN KEY products_categories_idcategories_foreign;
ALTER TABLE products CHANGE categories_idcategories category_id BIGINT UNSIGNED;
ALTER TABLE products ADD CONSTRAINT products_category_id_foreign FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE;

# DEVLM 2024.7 - SE RENOMBRO BRAND_ID EN LA TABLA PRODUCTO 
-- Eliminar la clave foránea existente
ALTER TABLE products DROP FOREIGN KEY products_brands_id_foreign;

-- Renombrar la columna
ALTER TABLE products CHANGE brands_id brand_id BIGINT UNSIGNED;

-- Agregar la nueva clave foránea
ALTER TABLE products ADD CONSTRAINT products_brand_id_foreign FOREIGN KEY (brand_id) REFERENCES brands(id) ON DELETE CASCADE;



# DEV LM, 2024.07.19 COLUMNAS PARA LA DIRRECCIÓN DEL USUARIO

ALTER TABLE users 
ADD COLUMN phone_number VARCHAR(20);

ADD COLUMN address VARCHAR(255),
ADD COLUMN address_number VARCHAR(25),
ADD COLUMN house_number VARCHAR(25),
ADD COLUMN postal_code VARCHAR(20),
ADD COLUMN city VARCHAR(100),
ADD COLUMN state VARCHAR(100);

# DEV LM 2024.07.21 SE RENOMBRO LA COLUMNA ADDRESS_NUMBER

ALTER TABLE users RENAME COLUMN address_number TO street;

