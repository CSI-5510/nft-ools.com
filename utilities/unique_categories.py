categories = [1,1,1,1,2,2,2,3,3,4,4,4,4,5,5,5,6,6,6,6,6]

def getUinqueItems(data):
    old = None
    new = None
    _r = []
    for row in data:
        if(old is None):
            _r.append(row)
            old = row
            continue
        new = row
        if(new != old):
           _r.append(row)
        old = new
    return _r

result = getUinqueItems(categories)
print (result)