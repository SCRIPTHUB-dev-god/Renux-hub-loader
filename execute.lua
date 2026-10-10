local file_path = "data.json"

local function readCount()
  local f = io.open(file_path, "r")
  if not f then return 0 end
  local content = f:read("*a")
  f:close()
  local number = content:match('"runs"%s*:%s*(%d+)')
  return tonumber(number) or 0
end

local function saveCount(count)
  local f = io.open(file_path, "w")
  f:write(string.format('{"runs": %d}', count))
  f:close()
end

local count = readCount()
count = count + 1
saveCount(count)
