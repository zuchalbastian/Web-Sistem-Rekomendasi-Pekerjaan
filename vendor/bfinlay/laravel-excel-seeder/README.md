# Laravel Excel Seeder
> #### Seed your database using CSV files, XLSX files, and more with Laravel

With this package you can save time seeding your database. Instead of typing out seeder files, you can use CSV, XLSX, or any supported spreadsheet file format to load your project's database. There are configuration options available to control the insertion of data from your spreadsheet files.

This project was forked from [laravel-csv-seeder](https://github.com/jeroenzwart/laravel-csv-seeder) and rewritten to support processing multiple input files and to use the [PhpSpreadsheet](https://github.com/PHPOffice/PhpSpreadsheet) library to support XLSX and other file formats.

### Features

- Support CSV, XLS, XLSX, ODF, Gnumeric, XML, HTML, SLK files through [PhpSpreadsheet](https://github.com/PHPOffice/PhpSpreadsheet) library
- Seed from multiple spreadsheet files per Laravel seeder class
- Generate text output version of XLS spreadsheet for determining changes to XLS when branch merging
- Automatically resolve CSV filename to table name.
- Automatically resolve XLSX worksheet tabs to table names.
- Automatically map CSV and XLSX headers to table column names.
- Automatically determine delimiter for CSV files, including comma `,`, tab `\t`, pipe `|`, and semi-colon `;`
- Skip seeding data columns by using a prefix character in the spreadsheet column header.
- Hash values with a given array of column names.
- Seed default values into table columns.
- Adjust Laravel's timestamp at seeding.

## Installation
- Require this package directly by `composer require --dev bfinlay/laravel-excel-seeder`
- Or add this package in your composer.json and run `composer update`

    ```
    "bfinlay/laravel-excel-seeder": "~2.0"
    ```
## Simplest Usage
In the simplest form, you can use the `bfinlay\SpreadsheetSeeder\SpreadsheetSeeder`
as is and it will process all XLSX files in /database/seeds/*.xlsx (relative to Laravel project base path).

Just add the SpreadsheetSeeder to be called in your /database/seeder/DatabaseSeeder.php class.

```php
use Illuminate\Database\Seeder;
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SpreadsheetSeeder::class,
        ]);
    }
}
```

Place your spreadsheets into the path */database/seeds/* of your Laravel project.

With the default settings, the seeder makes certain assumptions about the XLSX files:
* worksheet (tab) names match --> table names in database
* worksheet (tab) has a header row and the column names match --> table column names in database
* If there is only one worksheet in the XLSX workbook either the worksheet (tab) name or workbook filename must match a table in the database. 


An Excel example:

| first_name    | last_name     | birthday   |
| ------------- | ------------- | ---------- |
| Foo           | Bar           | 1970-01-01 |
| John          | Doe           | 1980-01-01 |

A CSV example:
```
    first_name,last_name,birthday
    Foo,Bar,1970-01-01
    John,Doe,1980-01-01
```


## Basic usage
In most cases you will need to configure settings.
Create a seed class that extends `bfinlay\SpreadsheetSeeder\SpreadsheetSeeder` and configure settings on your class.  A seed class will look like this:
```php
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class UsersTableSeeder extends SpreadsheetSeeder
{    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // By default, the seeder will process all XLSX files in /database/seeds/*.xlsx (relative to Laravel project base path)
        
        // Example setting
        $this->worksheetTableMapping = ['Sheet1' => 'first_table', 'Sheet2' => 'second_table'];
        
        parent::run();
    }
}
```
## Excel Text Markdown Output for Branch Diffs
After running the database seeder, a subdirectory will be created using  
the same name as the input file.  A text output file will be created
for each worksheet using the worksheet name with an "md"
extension.  This text file contains a markdown text representation of each
worksheet (tab) in the workbook and can be used to determine
changes in the XLSX when merging branches from other contributors.

Check this file into the repository so that it can serve as a basis for
comparison.

You will have to merge the XLSX spreadsheet manually.

The file extension can be changed by setting the `textOutputFileExtension` setting.

## Configuration
### Data Source File

`$file` *(string*) or *(array []*)

This value is the path of the Excel or CSV file used as the data
source. This is a string or array[] and is list of files or directories
to process, which can include wildcards.

By default, the seeder will process all XLSX files in /database/seeds.

The path is specified relative to the root of the project

Default: `"/database/seeds/*.xlsx"`

```php
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class UsersTableSeeder extends SpreadsheetSeeder
{    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // specify relative to Laravel project base path
        $this->file = [
            '/database/seeds/file1.xlsx', 
            '/database/seeds/file2.xlsx',
            '/database/seeds/seed*.xlsx', 
            '/database/seeds/*.csv']; 
        
        parent::run();
    }
}
```

### Data Source File Default Extension
`$extension` *(string 'xlsx'*)

The default extension used when a directory is specified in $this->file

Default: `"xlsx"`

```php
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class UsersTableSeeder extends SpreadsheetSeeder
{    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // specify relative to Laravel project base path
        // feature directories specified
        $this->file = [
            '/database/seeds/feature1', 
            '/database/seeds/feature2',
            '/database/seeds/feature3', 
            ]; 
        
        // process all xlsx and csv files in paths specified above
        $this->extension = ['xlsx', 'csv'];
        
        parent::run();
    }
}
```

### Destination Table Name
`$tablename` *(string*)

Backward compatibility to laravel-csv-seeder

Table name to insert into in the database.  If this is not set then it
uses the name of the current CSV filename

Use worksheetTableMapping instead to map worksheet names to alternative
table names

Default: `null`

```php
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class UsersTableSeeder extends SpreadsheetSeeder
{    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // specify relative to Laravel project base path
        // specify filename that is automatically dumped from an external process
        $this->file = '/database/seeds/autodump01234456789.xlsx';  // note: could alternatively be a csv
        
        // specify the table this is loaded into
        $this->table = 'sales';
        
        // in this example, table truncation also needs to be disabled so previous sales records are not deleted
        $this->truncate = false;
        
        parent::run();
    }
}
```

### Truncate Destination Table
`$truncate` *(boolean TRUE)*

Truncate the table before seeding.

Default: `TRUE`

Note: does not currently support array of table names to exclude

See example for [tablename](#destination-table-name) above

### Header
`$header` *(boolean TRUE)*

If the data source has headers in the first row, setting this to true will
skip the first row.

Default: `TRUE`

### Delimiter
`$delimiter` *(string NULL)*

The delimiter used in CSV, tab-separate-files, and other text delimited
files.  When this is not set, the phpspreadsheet library will
automatically detect the text delimiter

Default: `null`

### Worksheet Table Mapping
`$worksheetTableMapping` *(array [])*

This is an associative array to map names of worksheets in an Excel file
to table names.

Excel worksheets have a 31 character limit.

This is useful when the table name should be longer than the worksheet
character limit.

Example: `['Sheet1' => 'first_table', 'Sheet2' => 'second_table']`

Default: `[]`

```php
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class UsersTableSeeder extends SpreadsheetSeeder
{    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // specify the table this is loaded into
        $this->worksheetTableMapping = [
            'first_table_name_abbreviated' => 'really_rather_very_super_long_first_table_name', 
            'second_table_name_abbreviated' => 'really_rather_very_super_long_second_table_name'
            ];
        
        parent::run();
    }
}
```

### Column "Mapping"
`$mapping` *(array [])*

Backward compatibility to laravel-csv-seeder

This is an array of column names that will be used as headers.

If $this->header is true then the first row of data will be skipped.
This allows existing headers in a CSV file to be overridden.

This is called "Mapping" because its intended use is to map the fields of
a CSV file without a header line to the columns of a database table.

Note: this setting is currently global and applies to all files or
worksheets that are processed.  To apply differently to different files,
process files with separate Seeder instances.

Example: `['Header Column 1', 'Header Column 2']`

Default: `[]`

### Column Aliases
`$aliases` *(array [])*

This is an associative array to map the column names of the data source
to alternative column names (aliases).

Note: this setting is currently global and applies to all files or
worksheets that are processed.  All columns with the same name in all files
or worksheets will have the same alias applied.  To apply differently to
different files, process files with separate Seeder instances.

Example: `['CSV Header 1' => 'Table Column 1', 'CSV Header 2' => 'Table Column 2']`

Default: `[]`

### Hashable
`$hashable` *(array ['password'])*

This is an array of column names in the data source that should be hashed
using Laravel's `Hash` facade.

The hashing algorithm is configured in `config/hashing.php` per
[https://laravel.com/docs/master/hashing](https://laravel.com/docs/master/hashing)

Note: this setting is currently global and applies to all files or
worksheets that are processed.  All columns with the specified name in all files
or worksheets will have hashing applied.  To apply differently to
different files, process files with separate Seeder instances.

Example: `['password', 'salt']`

Default: `[]`

### Validate
`$validate` *(array [])*

This is an associative array mapping column names in the data source that
should be validated to a Laravel Validator validation rule.
The available validation rules are described here:
[https://laravel.com/docs/master/validation#available-validation-rules](https://laravel.com/docs/master/validation#available-validation-rules)

Note: this setting is currently global and applies to all files or
worksheets that are processed.  All columns with the specified name in all files
or worksheets will have the validation rule applied.  To apply differently to
different files, process files with separate Seeder instances.

Example:
```
[
  'email' => 'unique:users,email_address',
  'start_date' => 'required|date|after:tomorrow',
  'finish_date' => 'required|date|after:start_date'
]
```

Default: `[]`

### Defaults
`$defaults` *(array [])*

This is an associative array mapping column names in the data source to
default values that will override any values in the datasource.

Note: this setting is currently global and applies to all files or
worksheets that are processed.  To apply differently to
different files, process files with separate Seeder instances.

Example: `['created_by' => 'seed', 'updated_by' => 'seed]`

Default: `[]`

### Skipper
`$skipper` *(string %)*

This is a string used as a prefix to indicate that a column in the data source
should be skipped.  For Excel workbooks, a worksheet prefixed with
this string will also be skipped.  The skipper prefix can be a
multi-character string.

- Example: Data source column `%id_copy` will be skipped with skipper set as `%`
- Example: Data source column `#id_copy` will be skipped with skipper set as `#`
- Example: Data source column `[skip]id_copy` will be skipped with skipper set as `[skip]`
- Example: Worksheet `%worksheet1` will be skipped with skipper set as `%`

Default: `"%"`;

### Timestamps
`$timestamps` *(string/boolean TRUE)*

When `true`, set the Laravel timestamp columns 'created_at' and 'updated_at'
with the current date/time.

When `false`, the fields will be set to NULL

Default: `true`

### Offset
`$offset` *(integer)*

Number of rows to skip at the start of the data source, excluding the
header row.

Default: `0`

### Input Encodings
`$inputEncodings` *(array [])*

Array of possible input encodings from input data source
See [https://www.php.net/manual/en/mbstring.supported-encodings.php](https://www.php.net/manual/en/mbstring.supported-encodings.php)

This value is used as the "from_encoding" parameter to mb_convert_encoding.
If this is not specified, the internal encoding is used.

Default: `[]`

### Output Encodings
`$outputEncoding` *(string)*

Output encoding to database
See [https://www.php.net/manual/en/mbstring.supported-encodings.php](https://www.php.net/manual/en/mbstring.supported-encodings.php)

This value is used as the "to_encoding" parameter to mb_convert_encoding.

Default: `UTF-8`;

## Details
#### Null values
- String conversions: 'null' is converted to `NULL`, 'true' is converted to `TRUE`, 'false' is converted to `FALSE`
- 'null' strings converted to `NULL` are treated as explicit nulls.  They are not subject to implicit conversions to default values. 
- Empty cells are set to the default value specified in the database table data definition, unless the entire row is empty
- If the entire row consists of empty cells, the row is skipped.  To intentionally insert a null row, put the string value 'null' in each cell

## Examples
#### Table with specified timestamps and specificied table name
Use a specific timestamp for 'created_at' and 'updated_at' and also
give the seeder a specific table name instead of using the CSV filename;

```php
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class UsersTableSeeder extends SpreadsheetSeeder
{    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->file = '/database/seeds/csvs/users.csv';
        $this->tablename = 'email_users';
        $this->timestamps = '1970-01-01 00:00:00';
        
        parent::run();
    }
}
```

#### Worksheet to Table Mapping
Map the worksheet tab names to table names.

Excel worksheet tabs have a 31 character limit.  This is useful when the table name should be longer than the worksheet tab character limit.

See [example](#worksheet-table-mapping) above

#### Mapping
Map the worksheet or CSV headers to table columns, with the following CSV;

##### XLSX
|    |               |               |
|----| ------------- | ------------- |
| 1  | Foo           | Bar           |
| 2  | John          | Doe           |

##### CSV
    1,Foo,Bar
    2,John,Doe

Example:
```php
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class UsersTableSeeder extends SpreadsheetSeeder
{    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->file = '/database/seeds/users.xlsx';
        $this->mapping = ['id', 'firstname', 'lastname'];
        $this->header = FALSE;
        
        parent::run();
    }
}
```

Note: this mapping is a legacy laravel-csv-seeder option.   The mapping currently applies to all
worksheets within a workbook, and is currently designed for single sheet workbooks
and CSV files.

There are two workarounds for mapping different column headers for different input files or worksheets:
1. add header columns to your multi-sheet workbooks
2. use CSVs or single-sheet workbooks and create a separate seeder for each that need different column mappings

#### Aliases with defaults
Seed a table with aliases and default values, like this;

```php
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class UsersTableSeeder extends SpreadsheetSeeder
{    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->file = '/database/seeds/csvs/users.csv';
        $this->aliases = ['csvColumnName' => 'table_column_name', 'foo' => 'bar'];
        $this->defaults = ['created_by' => 'seeder', 'updated_by' => 'seeder'];
        
        parent::run();
    }
}
```

#### Skipper
Skip a worksheet in a workbook, or a column in an XLSX or CSV with a prefix. For example you use `id` in your worksheet which is only usable in your workbook. The worksheet file might look like the following:

| %id | first_name    | last_name     | %id_copy | birthday   |
|-----| ------------- | ------------- | -------- | ---------- |
| 1   | Foo           | Bar           | 1        | 1970-01-01 |
| 2   | John          | Doe           | 2        | 1980-01-01 |

The first and fourth value of each row will be skipped with seeding. The default prefix is '%' and changeable.  In this example the skip prefix is changed to 'skip:'

| skip:id | first_name    | last_name     | skip:id_copy | birthday   |
|---------| ------------- | ------------- | ------------ | ---------- |
| 1       | Foo           | Bar           | 1            | 1970-01-01 |
| 2       | John          | Doe           | 2            | 1980-01-01 |

```php
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class UsersTableSeeder extends SpreadsheetSeeder
{    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->file = '/database/seeds/users.xlsx';
        $this->skipper = 'skip:';
        
        parent::run();
    }
}
```

To skip a worksheet in a workbook, prefix the worksheet name with '%' or the specified skipper prefix.

#### Validate
Validate each row of an XLSX or CSV like this;
```php
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class UsersTableSeeder extends SpreadsheetSeeder
{    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->file = '/database/seeds/users.xlsx';
        $this->validate = [ 'name'              => 'required',
                            'email'             => 'email',
                            'email_verified_at' => 'date_format:Y-m-d H:i:s',
                            'password'          => ['required', Rule::notIn([' '])]];
        
        parent::run();
    }
}
```

#### Hash
Hash values when seeding an XLSX or CSV like this;
```php
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class UsersTableSeeder extends SpreadsheetSeeder
{    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->file = '/database/seeds/users.xlsx';
        $this->hashable = ['password', 'salt'];
        
        parent::run();
    }
}
```

#### Input and Output Encodings
The mb_convert_encodings function is used to convert encodings.
* $this->inputEncodings is an array of possible input encodings.  Default is `[]` which defaults to internal encoding.  See [https://www.php.net/manual/en/mbstring.supported-encodings.php]
* $this->outputEncoding is the output encoding.  Default is 'UTF-8';
```php
use bfinlay\SpreadsheetSeeder\SpreadsheetSeeder;

class UsersTableSeeder extends SpreadsheetSeeder
{    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->file = '/database/seeds/users.xlsx';
        $this->inputEncodings = ['UTF-8', 'ISO-8859-1'];
        $this->outputEncoding = 'UTF-8';
        
        parent::run();
    }
}
```

#### Retrieving the list of tables seeded
The list of tables that were seeded can be retrieved by reading $this->tablesSeeded, 
which is an array of strings containing the names of the tables that were seeded.

This can be used after seeding to further process tables - for example to reset id sequence numbers in postgres
```php
    public function updatePostgresSeqCounters() {
        $tables = $this->tablesSeeded;
        foreach($tables as $table) {
            if (DB::connection()->getSchemaBuilder()->hasColumn($table, 'id')) {
                $return = DB::select("select setval('{$table}_id_seq', max(id)) from {$table}");
            }
        }
    }
```

## License
Laravel Excel Seeder is open-sourced software licensed under the MIT license.

## Changes
#### 2.1.5
- Change method for text output markdown files.   Create a directory with a separate markdown per sheet instead of one long file.
#### 2.1.4
- Fix bug where worksheet prefixed with skipper string was not skipped if it was the first worksheet in the workbook
#### 2.1.3
- Parameterize text table output to achieve different text table presentations
- Fix markdown issue where some tables with empty columns would not be rendered unless the outside column '|' symbols were present
#### 2.1.2
- Update text table output to output as markdown file
#### 2.1.1
- Fix bug with calling service container that prevented settings from being properly used
#### 2.1.0
- Refactor code for better separation of concerns and decrease coupling between classes
- Add feature to output textual representation of input source spreadsheets for diff
#### 2.0.6
- add input encodings and output encodings parameters
#### 2.0.5
- add tablesSeeded property to track which tables were seeded
#### 2.0.4
- add worksheet to table mapping for mapping worksheet tab names to different table names
- add example Excel spreadsheet '/database/seeds/xlsx/classicmodels.xlsx'
#### 2.0.3
- set default 'skipper' prefix to '%'
- recognize 'skipper' prefix strings greater than 1 character in length 
#### 2.0.2
- skip rows that are entirely empty cells
- skip worksheet tabs that are prefixed with the skipper character.  This allows for additional sheets to be used for documentation, alternative designs, or intermediate calculations.
- issue #2 - workaround to skip reading and calculating cells that are part of a skipped column.   Common use case is using `=index(X:X,match(Y,Z:Z,0))` in a skipped column to verify foreign keys.
