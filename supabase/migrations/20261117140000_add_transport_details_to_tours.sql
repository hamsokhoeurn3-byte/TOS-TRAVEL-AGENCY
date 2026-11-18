WITH transport_details(slug, transport_note) AS (
  VALUES
    ('angkor-sunrise-tour', 'Transportation: Shared air-conditioned minivan with hotel pickup and drop-off.'),
    ('explore-angkor', 'Transportation: Shared air-conditioned minivan with hotel pickup and drop-off.'),
    ('koh-ker-beng-mealea', 'Transportation: Shared air-conditioned minivan for the remote temple transfers, with hotel pickup and drop-off.'),
    ('kompong-phluk-floating-villages', 'Transportation: Shared minivan transfer to Kampong Phluk with hotel pickup and drop-off.'),
    ('banteay-srei-backcountry', 'Transportation: Shared air-conditioned minivan with hotel pickup and drop-off.'),
    ('kulen-waterfall', 'Transportation: Shared minivan transfer to Phnom Kulen with hotel pickup and drop-off.'),
    ('preah-vihear-koh-ker', 'Transportation: Shared minivan for the long-distance route; mountain access vehicle details are confirmed when booking.'),
    ('kulen-mountain-beng-mealea', 'Transportation: Shared minivan for the mountain and temple route with hotel pickup and drop-off.'),
    ('kulen-mountain-banteay-srei', 'Transportation: Shared minivan for the mountain and temple route with hotel pickup and drop-off.'),
    ('private-angkor-sunrise', 'Transportation: Private vehicle selected at booking: SUV, Sienna, minivan or van; price depends on vehicle size.'),
    ('private-angkor-temple-sunset', 'Transportation: Private car or van for your party; exact vehicle size is confirmed when booking.'),
    ('private-angkor-sunset', 'Transportation: Private car or van for your party; exact vehicle size is confirmed when booking.'),
    ('private-bakong-floating-village', 'Transportation: Private car or van for your party; confirm whether the village boat ticket is included.'),
    ('private-banteay-srei-kulen', 'Transportation: Private car or van for your party; exact vehicle size is confirmed when booking.'),
    ('private-beng-mealea-floating-village', 'Transportation: Private car or van for your party; village boat ticket is not included unless confirmed.'),
    ('private-kulen-beng-mealea', 'Transportation: Private car or van for your party; exact vehicle size is confirmed when booking.'),
    ('private-koh-ker-beng-mealea', 'Transportation: Private car or van for your party; exact vehicle size is confirmed when booking.'),
    ('vespa-angkor-grand-circuit', 'Transportation: Classic Vespa with a dedicated local driver, one per guest; vintage Jeep is an alternative.'),
    ('vespa-angkor-wat-sunrise', 'Transportation: Classic Vespa with a dedicated local driver, one per guest; vintage Jeep is an alternative.'),
    ('vespa-angkor-small-circuit', 'Transportation: Classic Vespa with a dedicated local driver, one per guest; vintage Jeep is an alternative.'),
    ('vespa-siem-reap-countryside', 'Transportation: Classic Vespa with a dedicated local driver, one per guest; vintage Jeep is an alternative.'),
    ('elephant-angkor-sunrise-bike', 'Transportation: Mountain bike for the route, hotel pickup and drop-off, plus a support vehicle with professional driver.'),
    ('elephant-siem-reap-countryside-bike', 'Transportation: Tuk-tuk pickup to the bike shop; countryside route and return to the shop are by mountain bike.'),
    ('elephant-siem-reap-twilight-bike', 'Transportation: Hotel pickup to the starting point; countryside route and return to the shop are by mountain bike.'),
    ('elephant-angkor-temples-bike', 'Transportation: Tuk-tuk pickup to the bike shop; Angkor route is by mountain bike, with no on-route vehicle support listed.'),
    ('elephant-countryside-bike-boat', 'Transportation: Tuk-tuk pickup, mountain bike for village roads, support air-conditioned vehicle for the lake transfer, and boat to the floating community.'),
    ('airport-transfer', 'Transportation: Private electric vehicle with driver, direct from the airport to your hotel.')
)
UPDATE tours AS t
SET included_items = array_append(t.included_items, d.transport_note)
FROM transport_details AS d
WHERE t.slug = d.slug
  AND NOT EXISTS (
    SELECT 1 FROM unnest(t.included_items) AS item
    WHERE item LIKE 'Transportation:%'
  );
