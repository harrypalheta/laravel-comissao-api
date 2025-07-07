# Laravel Comissão Api

## Rodar o Projeto

```sh
docker build -t laravel-comissao-api .
docker run -p 8000:8000 laravel-comissao-api
```

## Testando com Insomnia

Importe a collection de "./collections/Insomnia_v1.yaml" para seu insomnia.

## Testando com Curl

### Listar

```sh
curl --request GET \
  --url http://localhost:8000/api/sales \
  --header 'User-Agent: insomnia/11.2.0'
```

### Registar

```sh
curl --request POST \
  --url http://localhost:8000/api/sales \
  --header 'Content-Type: application/json' \
  --header 'User-Agent: insomnia/11.2.0' \
  --data '{
  "valor_total": 1000,
  "tipo_venda": "afiliada"
}'
```

### Deletar

```sh
curl --request DELETE \
  --url http://localhost:8000/api/sales/{id} \
  --header 'User-Agent: insomnia/11.2.0'
```

## Decisão de Ambiquidade

Foi utilizado o uuid para registro das informações tornando cada registro único.

