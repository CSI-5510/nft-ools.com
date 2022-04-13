old = ""

writer = ''
_old = old.split(';')
for _c in _old:
    var = _c[_c.find("$")+1:_c.find(" =")]
    txt = _c[_c.find(" '")+2:_c.find("';")]
    line = f'define("{var}","{txt}");'
    writer += f'{line}\n'
with open('./utilities/constant_conversion.txt', 'w') as f:
    f.write(writer)