local file_path = "data.json"

local function readCount()
  if type(isfile) == "function" and isfile(file_path) then
    local success, content = pcall(readfile, file_path)
    if success and content then
      local number = content:match('"runs"%s*:%s*(%d+)')
      return tonumber(number) or 0
    end
  end
  return 0
end

local function saveCount(count)
  if type(writefile) == "function" then
    pcall(writefile, file_path, string.format('{"runs": %d}', count))
  end
end

local count = readCount() + 1
saveCount(count)
