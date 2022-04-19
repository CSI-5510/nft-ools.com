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

    def write_array_no_mod(self):
        writer = 'array('
        for column in self.columns:
            writer += f"'{column}',"
        writer = writer[:-1]
        writer += ');'
        self.save(writer, f'{self.table_name.lower()}_no_mod_constants_array.txt')


columns = [
        'id',
        'order_id',
        'item_id',
        'description',
        'timestamp',
        'date',
        'cost',
        'type'
]

generateConstants('events_table', columns).write_array_no_mod()