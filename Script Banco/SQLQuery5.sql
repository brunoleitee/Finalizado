CREATE DATABASE bruno;

GO


CREATE TABLE cadastro(
             idcadastro        int primary key identity,
             nome              VARCHAR (150) NOT NULL,
             estado            CHAR (2) NOT NULL,
             cidade            VARCHAR (150) NOT NULL,
             rua               VARCHAR (150),
             numero            VARCHAR(10),
             referencia        VARCHAR (200),
             descricao         VARCHAR (3000),
             cep               CHAR (8)

);

GO
CREATE FUNCTION Consulta(@CEP            CHAR(8),
                         @nome           VARCHAR (150))

RETURNS @Resultado TABLE(nome            VARCHAR (150) NOT NULL,
                         estado          CHAR (2) NOT NULL,
                         cidade          VARCHAR (150) NOT NULL,
                         rua             VARCHAR (150),
                         numero          VARCHAR(10),
                         referencia      VARCHAR (200),
                         descricao       VARCHAR (3000),
                         cep              CHAR (8))
AS
BEGIN
  INSERT INTO @Resultado(nome,
                         estado,
                         cidade ,
                         rua,
                         numero,
                         referencia,
                         descricao,
                         cep)
  SELECT nome,
         estado,
         cidade,
         rua,
         numero,
         referencia,
         descricao,
         cep
  FROM cadastro
  WHERE ((@CEP <> '' AND CEP = @CEP) OR
         (@nome <> '' AND nome LIKE '%'+ @nome+'%'));

  RETURN;
END
GO
CREATE FUNCTION Consulta(@CEP            CHAR(8),
                         @nome           VARCHAR (150))
RETURNS @Resultado TABLE (nome           VARCHAR (150) NOT NULL,
                        estado           CHAR (2) NOT NULL,
                        cidade           VARCHAR (150) NOT NULL,
                           rua           VARCHAR (150),
                        numero           VARCHAR(10),
                    referencia           VARCHAR (200),
                     descricao           VARCHAR (3000),
                           cep           CHAR (8))
AS
BEGIN
  INSERT INTO @Resultado(nome,
                         estado,
                         cidade,
                         rua,
                         numero,
                         referencia,
                         descricao,
                         cep)
  SELECT nome,
         estado,
         cidade,
         rua,
         numero,
         referencia,
         descricao,
         cep
  FROM cadastro
  WHERE ((@CEP <> '' AND CEP = @CEP) OR
         (@nome <> '' AND nome LIKE '%'+ @nome+'%'));

  RETURN;
END