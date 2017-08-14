# Clean Me Exercise

The User class has been broken into its component parts to aid manageability and extensibility. To save overhead in the form of expensive database connections, a centralised Singleton class has been built to handle DB operations

All display code has been removed from the classes and placed in the output file, to properly separate logic and display

All member names have been converted to camelCase (including getProperties) for uniformity

To aid future maintenance, comments have been added in PHPDoc format

Properties have been put into a database table. It has been assumed that the first integer in the hard array was the PK ID of the record