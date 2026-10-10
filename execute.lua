local file_path = "data.json"

local function readCount()
  local f = io.open(file_path, "r")
  if not f then return 0 end
  local content = f:read("*all")
  f:close()
  return tonumber(content:match('"runs"%s*:%s*(%d+)')) or 0
end

local function saveCount(count)
  local f = io.open(file_path, "w")
  if f then
    f:write(string.format('{"runs": %d}', count))
    f:close()
  end
end

saveCount(readCount() + 1)
