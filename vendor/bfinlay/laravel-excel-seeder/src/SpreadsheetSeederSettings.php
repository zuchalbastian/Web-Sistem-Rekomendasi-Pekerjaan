<?php


namespace bfinlay\SpreadsheetSeeder;

class SpreadsheetSeederSettings
{
    /*
    |--------------------------------------------------------------------------
    | Data Source File
    |--------------------------------------------------------------------------
    |
    | This value is the path of the Excel or CSV file used as the data
    | source. This is a string or array[] and is list of files or directories
    | to process, which can include wildcards.
    |
    | The path is specified relative to the root of the project
    |
    | Default: "/database/seeds/*.xlsx"
    |
    */
    public $file = "/database/seeds/*.xlsx";

    /*
    |--------------------------------------------------------------------------
    | Data Source File Default Extension
    |--------------------------------------------------------------------------
    |
    | The default extension used when a directory is specified in $this->file
    |
    | Default: "xlsx"
    |
    */
    public $extension = "xlsx";

    /*
    |--------------------------------------------------------------------------
    | Data Source File Default Extension
    |--------------------------------------------------------------------------
    | Backward compatibility to laravel-csv-seeder
    |
    | Table name to insert into in the database.  If this is not set then it
    | uses the name of the current CSV filename
    |
    | Use worksheetTableMapping instead to map worksheet names to alternative
    | table names
    |
    | Default: null
    |
    */
    public $tablename = null;

    /*
    |--------------------------------------------------------------------------
    | Truncate Destination Table
    |--------------------------------------------------------------------------
    |
    | Truncate the table before seeding.
    |
    | Default: TRUE
    |
    | Note: does not currently support array of table names to exclude
    |
    */
    public $truncate = TRUE;

    /*
    |--------------------------------------------------------------------------
    | Header
    |--------------------------------------------------------------------------
    |
    | If the data source has headers in the first row, setting this to true will
    | skip the first row.
    |
    | Default: TRUE
    |
    */
    public $header = TRUE;

    /*
    |--------------------------------------------------------------------------
    | Delimiter
    |--------------------------------------------------------------------------
    |
    | The delimiter used in CSV, tab-separate-files, and other text delimited
    | files.  When this is not set, the phpspreadsheet library will
    | automatically detect the text delimiter
    |
    | Default: null
    |
    */
    public $delimiter = null;

    /*
    |--------------------------------------------------------------------------
    | Worksheet Table Mapping
    |--------------------------------------------------------------------------
    |
    | This is an associative array to map names of worksheets in an Excel file
    | to table names.
    |
    | Excel worksheets have a 31 character limit.
    |
    | This is useful when the table name should be longer than the worksheet
    | character limit.
    |
    | Example: ['Sheet1' => 'first_table', 'Sheet2' => 'second_table']
    |
    | Default: []
    |
    */
    public $worksheetTableMapping = [];

    /*
    |--------------------------------------------------------------------------
    | Column "Mapping"
    |--------------------------------------------------------------------------
    | Backward compatibility to laravel-csv-seeder
    |
    | This is an array of column names that will be used as headers.
    |
    | If $this->header is true then the first row of data will be skipped.
    | This allows existing headers in a CSV file to be overridden.
    |
    | This is called "Mapping" because its intended use is to map the fields of
    | a CSV file without a header line to the columns of a database table.
    |
    | Note: this setting is currently global and applies to all files or
    | worksheets that are processed.  To apply differently to different files,
    | process files with separate Seeder instances.
    |
    | Example: ['Header Column 1', 'Header Column 2']
    |
    | Default: []
    |
    */
    public $mapping = [];

    /*
    |--------------------------------------------------------------------------
    | Column Aliases
    |--------------------------------------------------------------------------
    |
    | This is an associative array to map the column names of the data source
    | to alternative column names (aliases).
    |
    | Note: this setting is currently global and applies to all files or
    | worksheets that are processed.  All columns with the same name in all files
    | or worksheets will have the same alias applied.  To apply differently to
    | different files, process files with separate Seeder instances.
    |
    | Example: ['CSV Header 1' => 'Table Column 1', 'CSV Header 2' => 'Table Column 2']
    |
    | Default: []
    |
    */
    public $aliases = [];

    /*
    |--------------------------------------------------------------------------
    | Hashable
    |--------------------------------------------------------------------------
    |
    | This is an array of column names in the data source that should be hashed
    | using Laravel's `Hash` facade.
    |
    | The hashing algorithm is configured in `config/hashing.php` per
    | https://laravel.com/docs/master/hashing
    |
    | Note: this setting is currently global and applies to all files or
    | worksheets that are processed.  All columns with the specified name in all files
    | or worksheets will have hashing applied.  To apply differently to
    | different files, process files with separate Seeder instances.
    |
    | Example: ['password', 'salt']
    |
    | Default: []
    |
    */
    public $hashable = [];

    /*
    |--------------------------------------------------------------------------
    | Validate
    |--------------------------------------------------------------------------
    |
    | This is an associative array mapping column names in the data source that
    | should be validated to a Laravel Validator validation rule.
    | The available validation rules are described here:
    | https://laravel.com/docs/master/validation#available-validation-rules
    |
    | Note: this setting is currently global and applies to all files or
    | worksheets that are processed.  All columns with the specified name in all files
    | or worksheets will have the validation rule applied.  To apply differently to
    | different files, process files with separate Seeder instances.
    |
    | Example: [
    |   'email' => 'unique:users,email_address',
    |   'start_date' => 'required|date|after:tomorrow',
    |   'finish_date' => 'required|date|after:start_date'
    | ]
    |
    | Default: []
    |
    */
    public $validate = [];

    /*
    |--------------------------------------------------------------------------
    | Defaults
    |--------------------------------------------------------------------------
    |
    | This is an associative array mapping column names in the data source to
    | default values that will override any values in the datasource.
    |
    | Note: this setting is currently global and applies to all files or
    | worksheets that are processed.  To apply differently to
    | different files, process files with separate Seeder instances.
    |
    | Example: ['created_by' => 'seed', 'updated_by' => 'seed]
    |
    | Default: []
    |
    */
    public $defaults = [];

    /*
    |--------------------------------------------------------------------------
    | Skipper
    |--------------------------------------------------------------------------
    |
    | This is a string used as a prefix to indicate that a column in the data source
    | should be skipped.  For Excel workbooks, a worksheet prefixed with
    | this string will also be skipped.  The skipper prefix can be a
    | multi-character string.
    |
    | Example: Data source column '%id_copy' will be skipped with skipper set as '%'
    | Example: Data source column '#id_copy' will be skipped with skipper set as '#'
    | Example: Data source column '[skip]id_copy' will be skipped with skipper set as '[skip]'
    | Example: Worksheet '%worksheet1' will be skipped with skipper set as '%'
    |
    | Default: "%";
    |
    */
    public $skipper = "%";

    /*
    |--------------------------------------------------------------------------
    | Timestamps
    |--------------------------------------------------------------------------
    |
    | When `true`, set the Laravel timestamp columns 'created_at' and 'updated_at'
    | with the current date/time.
    |
    | When `false`, the fields will be set to NULL
    |
    | Default: true
    |
    */
    public $timestamps = true;

    /*
    |--------------------------------------------------------------------------
    | Offset
    |--------------------------------------------------------------------------
    |
    | Number of rows to skip at the start of the data source, excluding the
    | header row.
    |
    | Default: 0
    |
    */
    public $offset = 0;

    /*
    |--------------------------------------------------------------------------
    | Input Encodings
    |--------------------------------------------------------------------------
    |
    | Array of possible input encodings from input data source
    | See https://www.php.net/manual/en/mbstring.supported-encodings.php
    |
    | This value is used as the "from_encoding" parameter to mb_convert_encoding.
    | If this is not specified, the internal encoding is used.
    |
    | Default: []
    |
    */
    public $inputEncodings = [];

    /*
    |--------------------------------------------------------------------------
    | Output Encodings
    |--------------------------------------------------------------------------
    |
    | Output encoding to database
    | See https://www.php.net/manual/en/mbstring.supported-encodings.php
    |
    | This value is used as the "to_encoding" parameter to mb_convert_encoding.
    |
    | Default: "UTF-8";
    |
    */
    public $outputEncoding = "UTF-8";

    /*
    |--------------------------------------------------------------------------
    | Text Output Table Extension
    |--------------------------------------------------------------------------
    |
    | Extension for text output table
    |
    | After processing a workbook, the seeder outputs a text format of
    | the sheet to assist with diff and merge of the workbook.  The default format
    | is markdown 'md' which will render the text as tables in markdown viewers
    | like github.   This can be changed by setting this attribute.
    |
    | Default: "md";
    |
    */
    public $textOutputFileExtension = "md";

    private static $instance = null;

    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new static();
        }

        return $self::instance;
    }
}