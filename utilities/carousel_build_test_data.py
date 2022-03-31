import json


'''
case('000001000'):
    return '
        {
            "name": "Hand Tools Sub 0",
            "image": "../backend/test_images/trade.png",
            "price": 0.00,
            "url": ""
        }
    ';
    break;
'''

def add_leading(s, spaces):
    _s = str(s)
    while (len(_s) < spaces):
        _s = '0' + _s
    return _s


def make_dict(category, index):
    name = f'{category} sub {index}'
    _dict = {
        "name": name,
        "image": "../backend/test_images/blank.png",
        "price": 0.00,
        "url": ""
    }
    return json.dumps(_dict, indent=4)


def make_id(cat_index, sub_cat_index):
    return f'{add_leading(cat_index, 3)}{add_leading(sub_cat_index, 3)}000'


def make_element(cat_index, cat_name, sub_cat_index):
    return f'case("{make_id(cat_index, sub_cat_index)}"):\n\treturn "\n\t\t{make_dict(cat_name, sub_cat_index)}\n\t";\nbreak;\n'


layer_0 = ['hand', 'power', 'lawn', 'stationary', 'auto', 'trade']
tile_count = 6
writer = ''
for i, category in enumerate(layer_0):
    for j in range(tile_count):
        writer += make_element(i, category, j)
with open('./utilities/carousel_test_data.txt', 'w') as f:
    f.write(writer)
