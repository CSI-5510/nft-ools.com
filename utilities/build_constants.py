class generateConstants:


    def __init__(self, table_name, columns):
        self.columns = columns
        self.table_name = table_name.upper()

    def save(self, data, file_name):
        with open(f'./utilities/{file_name}', 'w') as f:
            f.write(data)

    def write_definition_functions(self):
        writer = ''
        for column in self.columns:
            writer += f'define("{self.table_name}_{column.upper()}","{column}");\n'
        self.save(writer, f'{self.table_name}_constant_definitions.txt')


    def write_array(self):
        writer = 'array('
        for column in self.columns:
            writer += f'{self.table_name}_{column.upper()},'
        writer = writer[:-1]
        writer += ');'
        self.save(writer, f'{self.table_name.lower()}_constants_array.txt')


columns = [
    'i_id', 'i_name', 'i_description', 'current_price', 'i_image', 'i_category_Id', 'i_serialnum', 'original_price', 'is_approved', 'owner_id', 'days_to_minimum_price', 'receipt', 'documentation', 'original_purchase_date', 'rejection_reason', 'was_reviewed', 'timestamp', 'admin_review', 'rejected', 'added_to_system', 'upgraded', 'repaired', 'listed_for_sale', 'delisted_from_sale', 'in_cart', 'pending_sale', 'sold', 'new_owner_received'
]

generateConstants('item_table', columns).write_array()