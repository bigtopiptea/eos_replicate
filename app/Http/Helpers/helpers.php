<?php


use Intervention\Image\Image;
use Illuminate\Support\Facades\{File, Schema};
use Illuminate\Support\Str;
use Illuminate\Container\Container;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;


function resizeImage($image)
{
    $logo_name = generateImageName($image);
    \Image::make($image)->resize(300, 200)->save(public_path('images/') . $logo_name);
    //seperate the image by module_name
}

function getImage($image)
{
    return File::get(public_path('images/') . $image);
}

function checkIfImageExists($image)
{
    return File::exists(public_path('images/') . $image);
}

function convertToBase64Image($image)
{
    return  'data:image/' . pathinfo($image, PATHINFO_EXTENSION) . ';base64,' . base64_encode(getImage($image));
}

function generateImageName($image)
{
    return  'borgir' . time() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
}

function checkImageIfBase64($image)
{
    return preg_match('/data:image\/(\w+);base64,/', $image) == true;
}


// $model: The model of the table to be filtered.
// $table: The name of the table in the database.
// $column: The column to be used for ordering the results.
// $sortBy: The sorting order, "ASC" or "DESC".
// $per_page: The number of results per page.
// $filters:$filters = $model->where('user_name', 'like', '%' . $filter . '%')
// ->orWhere('first_name', 'like', '%' . $filter . '%')
// ->orWhere('middle_name', 'like', '%' . $filter . '%')
// ->orWhere('last_name', 'like', '%' . $filter . '%')
// ->orWhere('first_name', 'like', '%' . $filter . '%')
// ->orWhereHas('companyName', function ($query) use ($filter) {

//     $query->where('name', 'like', '%' . $filter . '%');
// })
// ->orWhereHas('branchName', function ($query) use ($filter) {
//     $query->where('name', 'like', '%' . $filter . '%');
// });
// $relationships: an array of relationships to be loaded with the results
// $relationshipTableToQuery : the table name of the related table
function sortTableByColumn($model, $table, $column, $sortBy, $per_page, $filters = [], $relationships = [], $relationshipTableToQuery)
{
    $singular = Str::singular($relationshipTableToQuery);

    if ($relationships) {
        $model = $model->with($relationships);
    }
    if ($filters) {
        $model = $filters;
    }
    if ($column) {
        if (Schema::hasColumn($table, $column)) {
            $model->orderBy($column, $sortBy);
        } else {
            if (Schema::hasColumn($relationshipTableToQuery, $column)) {
                $model->join($relationshipTableToQuery, $table . '.' . $singular . '_id', '=', $relationshipTableToQuery . '.id')
                    ->orderBy($relationshipTableToQuery . '.' . $column, $sortBy);
            }
        }
    }

    return response()->json($model->paginate($per_page));
}

function paginate(Collection $results, $showPerPage, $pageName = 'page')
{
    $pageNumber = Paginator::resolveCurrentPage($pageName);

    $totalPageNumber = $results->count();

    return paginator($results->forPage($pageNumber, $showPerPage), $totalPageNumber, $showPerPage, $pageNumber, [
        'path' => Paginator::resolveCurrentPath(),
        'pageName' => $pageName,
    ]);
}

function paginator($items, $total, $perPage, $currentPage, $options)
{
    return Container::getInstance()->makeWith(LengthAwarePaginator::class, compact(
        'items',
        'total',
        'perPage',
        'currentPage',
        'options'
    ));
}

function money_format($value)
{
    return number_format((float)$value, 2, '.', ',');
}
