<?php


namespace App\Services\Filters;

/**
 * Class PagarmeFilter
 * @package App\Services\Filters
 */
class PagarmeFilter
{
    /**
     * @param array $data
     * @return array|string
     */
    public function dataFilterJson(array $data){

        $itemsJson = $this->dataFilterItemsJson($data['items']);
        $format = [
              'amount' => $data['value'],
              'payment_method' => $data['payment_method'],
              'card_holder_name' => $data['card_name'],
              'card_cvv' => ['card_cvv'],
              'card_number' => $data['card_number'],
              'card_expiration_date' => $data['card_date'],
              'customer' => [
                'external_id' => '1',
                'name' => $data['name'],
                'type' => 'individual',
                'country' => $data['country'],
                'documents' => [
                    [
                        'type' => 'cpf',
                        'number' => $data['cpf']
                    ]
                ],
            'phone_numbers' => [ $data['phone'] ],
            'email' => $data['email']
            ],
              'billing' => [
                    'name' => $data['name'],
                    'address' => [
                        'country' => $data['country'],
                        'street' => $data['street'],
                        'street_number' => ['address_number'],
                        'state' => $data['state'],
                        'city' => $data['city'],
                        'neighborhood' => $data['neighborhood'],
                        'zipcode' => $data['cep']
                    ]
                ],
              'items' => $itemsJson

        ];

        return $itemsJson;
    }

    /**
     * @param array $items
     * @return array|string
     */
    public function dataFilterItemsJson(array $items){

        $dataFomart = [];
        foreach ($items as $item){
            $format = [
                'id' => $item['id'],
                'title' => $item['title'],
                'unit_price' => $item['price'],
                'quantity' => $item['qtd'],
                'tangible' => true
            ];

            $dataFomart = $dataFomart.$format;

        }
        return $dataFomart;
    }

}
