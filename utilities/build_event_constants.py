event_types = [
    'admin_review','rejected','added_to_system','upgraded','repaired','listed_for_sale','delisted_from_sale','in_cart','pending_sale','sold','new_owner_received'
]

writer = ''
for event in event_types:
    writer += f'define("EVENT_TYPE_{event.upper()}","{event}");\n'

with open('event_type_constants.txt', 'w') as f:
    f.write(writer)