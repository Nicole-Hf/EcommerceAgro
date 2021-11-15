

create table productotest( 
id serial primary key, 
nombre varchar(100) not null, 
descripcion text not null, 
precio decimal(10,2) not null, 
imagen varchar(256) not null, 
stock int not null, 
empresa_id serial,
marca_id serial,
subcategoria_id serial,
created_at TIMESTAMP,
update_at TIMESTAMP,
delete_at TIMESTAMP
); 

insert into productotest (nombre,descripcion, precio,imagen, stock, empresa_id, marca_id, subcategoria_id) values 

('tomato.sem', 'cuide sus platas',110.10,'xxxxxxxxxxxx',15,1,1,1), 

('naranja.sem', 'cuide sus platas',55.00,'xxxxxxxxxxxx',12,1,1,1); 
select * from productotest;
 delete from productotest
  where nombre='tomato.sem';
