# Unnamed fuel tracker
Gas/Fuel consumption tracker

# todo's, notes and ideas

## bugs

- lots of, don't report
- tank missing at fueling

## planned

- api
- add user base currency
- store exchange rate to user's base currency at time of fueling to fueling
- Support types of cars to switch themes and display other, more important information i.e. "Daily Driver" (blueish design; km driven, consumption, costs/km & overall), "Commute only" (economy design, costs/month), "Racecar" (red/black design; costs)
- Add picture uploads for receipes and vehicles (stations?)
- Add categories or tags, so fuel logs can be differentiated between private/work/travel/commute (user defined)
- Add export / sync with other applications which support import or sync to google drive (i.e. Fuelio)
- Add support to choose car from dropdown via internet database (also model code / VIN)
- Add support for multi-fuel/flex engines, see https://en.wikipedia.org/wiki/Flexible-fuel_vehicle or https://www.cargas.de/car-gas/produkte/prins-vsi-dieselblend-20/, they combine for instance diesel and LPG/CNG
- Add support for different EV charging methods, since they differ in costs and are using the same tank (just like flex fuel cars)

# done's

- Support not only distances but usage hours (renaming distance to utilization)
- table for fuelings
- table for vehicles
- table for utilization_units (km, mi, nm (nautic miles), h (hours))
- table for capacity_units (liter, gallons etc)
- table for consumption_units (l/100km, mpg, mpge, kWh/100km etc)
- table for payment_types (credit card, debit card, paypal, apple pay etc)
- table for currencies (EUR, USD etc)
- table for fuel_types (petrol, diesel, electric etc)
- table for tanks (id, fuel_type_uuid, capacity, capacity_unit_uuid, flag if standard)
- table for fuel_subtypes (super / super plus / ethanol etc) // CANCELED
- table for places (i.e. gas stations, at home like farmes refuel etc)
